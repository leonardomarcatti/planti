<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{
   private object $model;

   private function encriptData(string $data): string
   {
      return \base64_encode($data);
   }

   public function logupAction()
   {
      \helper('form');

      $post = $this->request->getPost(['name', 'email', 'password', 'password2']);
      $rules = [
         'name' => [
            'rules' => 'required|min_length[3]',
            'erros' => ['required' => 'O campo é obrigatório', 'nim_length' => 'O campo deve ter pelo menos 3 caracteres']
         ],
         'email' => [
            'rules' => 'required|max_length[254]|valid_email',
            'errors' => ['required' => 'O campo é obrigatório', 'valid_email' => 'O campo deve ser um email válido']
         ],
         'password' => [
            'rules' => 'required|min_length[6]',
            'errors' => ['required' => 'O campo é obrigatório', 'min_length' => 'O campo deve ter pelo menos 6 caracteres']
         ],
         'password2' => [
            'rules' => 'required|matches[password]',
            'errors' => ['required' => 'O campo é obrigatório', 'matches' => 'As senhas não combinam']
         ]
      ];

      $validData = $this->validateData($post, $rules);

      if ($this->request->getMethod() == 'POST' && $validData) {
         $this->model = new UsersModel();
         $result = $this->model->addUser($this->encriptData($post['name']), $this->encriptData($post['email']), $this->encriptData($post['password']));

         if ($result) {
            return redirect()->to("login")->withInput()->with('success', 'Usuário cadastrado com sucesso');
         }

         return \redirect()->route('logup')->withInput()->with('bad_email', 'Email em uso');
      }

      return \redirect()->route('logup')->withInput()->with('errors', \session()->setTempdata('err', $this->validator->getErrors(), 10));
   }

   public function loginAction()
   {
      helper('form');
      $post = $this->request->getPost(['email', 'password']);

      $rules = [
         'email'    => [
            'rules' => 'required|valid_email',
            'errors' => ['required' => 'O campo é obrigatório', 'valid_email' => 'Insira um email válido'],

         ],
         'password' => [
            'rules' => 'required|min_length[6]',
            'errors' => ['required' => 'O campo é obrigatório', 'min_length' => 'O campo deve ter pelo menos 6 caracteres'],
         ]
      ];

      $validData = $this->validateData($post, $rules);

      if ($this->request->getMethod() === 'POST' && $validData) {
         $this->model = new UsersModel();
         $foundUser = $this->model->getUser($this->encriptData($post['email']), $this->encriptData($post['password']));
         if ($foundUser) {
            \session()->set(['id' => $foundUser->id, 'name' => \base64_decode($foundUser->name)]);
            return \redirect()->route('home');
         }

         return \redirect()->route('login')->withInput()->with('bad_email', 'Usuário e/ou senha não cadastrados');
      }
      return \redirect()->route('login')->withInput()->with('errors', \session()->setTempdata('err', $this->validator->getErrors(), 10));
   }

   public function logout()
   {
      \session()->destroy();
      return \redirect()->route('login');
   }

   public function validateEmail()
   {
      $post = $this->request->getPost(['email']);

      $rules = [
         'email'    => [
            'rules' => 'required|valid_email',
            'errors' => ['required' => 'O campo é obrigatório', 'valid_email' => 'Insira um email válido'],
         ]
      ];

      $validData = $this->validateData($post, $rules);

      if ($this->request->getMethod() === 'POST' && $validData) {
         $this->model = new UsersModel();
         $result = $this->model->checkEmail($this->encriptData($post['email']));

         if ($result['response']) {
            return \redirect()->back()->withInput()->with('bad_email', 'O email Não existe');
         } else {
            return \redirect()->route('updatePassword')->with('sessionID', \session()->setTempdata('userID', $result['id'], 300));
         }
      }

      return \redirect()->back()->withInput()->with('errors', \session()->setTempdata('err', $this->validator->getErrors(), 10));
   }

   public function updatePassword()
   {

      \helper('form');

      $post = $this->request->getPost(['password', 'confirmPassword', 'userID']);
      $rules = [
         'password' => [
            'rules' => 'required|min_length[6]',
            'errors' => ['required' => 'O campo é obrigatório', 'min_length' => 'O campo deve ter pelo menos 6 caracteres']
         ],
         'confirmPassword' => [
            'rules' => 'required|matches[password]',
            'errors' => ['required' => 'O campo é obrigatório', 'matches' => 'As senhas não combinam']
         ]
      ];

      $validData = $this->validateData($post, $rules);
      if ($this->request->getMethod() == 'POST' && $validData) {
         $model = $this->model = new UsersModel();

         $result = $model->updatePassword($this->encriptData($post['password']), $post['userID']);

         if ($result) {
            return \redirect()->route('login')->withInput()->with('success', 'Senha atualizada com sucesso');
         }

         return \redirect()->route('logup')->withInput()->with('error', 'Erro ao atualizar a senha. Tente novamente mais tarde.');
      }

      return redirect()->to(current_url())->with('errors', \session()->setTempdata('err', $this->validator->getErrors(), 10));
   }
}
