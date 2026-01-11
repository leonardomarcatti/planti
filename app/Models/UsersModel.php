<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class UsersModel extends Model
{

   protected $table = 'users';
   protected $allowedFields = ['name', 'password', 'email', 'created_at', 'updated_at'];
   protected $primaryKey = 'id';

   public function getUser($email, $password)
   {
      $user = $this->select(['id', 'name'])->where('email', $email)->where('password', $password)->get()->getRow();
      return ($user) ? $user : false;
   }

   public function retrieveUserData(string $id) : array
   {
      return $this->select()->where('id', $id)->get()->getRowArray();
   }

   public function checkEmail(string $email): array
   {
      $result = $this->select(['id'])->where('email', $email)->get()->getRowArray();
      if (isset($result['id'])) {
         return ['response' => false, 'id' => $result['id']];
      }

      return ['response' => true, 'id' => null];
   }

   public function addUser(string $name, string $email, string $password): bool
   {
      $checkedEmail = $this->checkEmail($email);
      if ($checkedEmail) {
         $this->insert(['name' => $name, 'password' => $password, 'email' => $email, 'created_at' => Time::now()]);
         return true;
      }

      return false;
   }

   public function updatePassword(string $password, string $id): bool
   {
      return $this->set('password', $password)->where('id', $id)->update();
   }


   public function updateUser(string $name, string $password, string $email, string $id)
   {
      return $this->where('id', $id)
      ->set(['updated_at' => Time::now(), 'name' => $name, 'password' => $password, 'email' => $email ])
      ->update();
   }

}
