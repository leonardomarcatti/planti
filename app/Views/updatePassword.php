<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<?= $this->include('templates/header') ?>
<main id="login">
   <section class="col-4 offset-4">
      <div id="flashbad">
         <p><?= session()->getFlashdata('error') ?? '' ?></p>
      </div>
      <form action="updatePassword" method="post" id="form_login">
         <?= csrf_field() ?>
         <input type="text" name="userID" id="userID" value=<?= session()->getTempdata('userID') ?> hidden>
         <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="small"><?= session()->getTempdata('err')['password'] ?? '' ?></small>
         </div>
         <div class="mb-3">
            <label for="password" class="form-label">Confirme Senha:</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
            <small class="small"><?= session()->getTempdata('err')['confirmPassword'] ?? '' ?></small>
         </div>
         <div class="mb-3">
            <button type="submit" class="btn btn-success" id="btn_clear">Atualize</button>
         </div>
      </form>
   </section>
</main>
<?= $this->include('templates/footer') ?>
<?= $this->endSection() ?>