<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<?= $this->include('templates/header') ?>
<main>
   <section>
      <div class="col-4 offset-4">
         <?= session()->getFlashdata('error') ?>
         <?= service('validation')->listErrors() ?>
         <div id="flashbad">
            <p><?= session()->getFlashdata('bad_email') ?? '' ?></p>
         </div>
         <div id="flashGood">
            <p><?= session()->getFlashdata('success') ?? '' ?></p>
         </div>
         <form action="<?= route_to('updateUserAction') ?>" method="post" id="form_login">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
               <label for="name" class="form-label">Nome:</label>
               <input type="text" name="name" id="name" class="form-control" value="<?= $user['name'] ?>">
               <small class="small"><?= session()->getTempdata('err')['name'] ?? '' ?></small>
            </div>
            <div class="mb-3">
               <label for="email" class="form-label">Email:</label>
               <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>">
               <small class="small"><?= session()->getTempdata('err')['email'] ?? '' ?></small>
            </div>
            <div class="mb-3">
               <label for="password" class="form-label">Senha:</label>
               <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
               <small class="small"><?= session()->getTempdata('err')['password'] ?? '' ?></small>
            </div>
            <div class="mb-3">
               <label for="password2" class="form-label">Repita Senha:</label>
               <input type="password" name="password2" id="password2" class="form-control" value="">
               <small class="small"><?= session()->getTempdata('err')['password2'] ?? '' ?></small>
            </div>
            <div class="mb-3 clear-both">
               <button type="reset" class="btn btn-danger float-end" id="btn_consulta">Limpar</button>
               <button type="submit" class="btn btn-success float-end" id="btn_consulta">Atualizar</button>
               <a href="/" class="btn btn-warning">Voltar</a>
            </div>
         </form>
      </div>
   </section>
</main>

<?= $this->include('templates/footer') ?>
<?= $this->endSection('content') ?>