<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('templates/header') ?>

<main class="d-flex flex-column justify-content-center align-items-center">
   <section class="col-4">
      <?= session()->getFlashdata('error') ?>
      <?= service('validation')->listErrors() ?>
      <div id="flashbad">
         <p><?= session()->getFlashdata('bad_email') ?? '' ?></p>
      </div>
      <div id="flashGood">
         <p><?= session()->getFlashdata('password_updated') ?? '' ?></p>
      </div>
      <form action="validateEmail" method="post" class="d-flex flex-column justify-content-start">
         <?= csrf_field() ?>
         <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
            <small class="small"><?= session()->getTempdata('err')['email'] ?? '' ?></small>
         </div>
         <div class="mb-3">
            <button type="submit" class="btn btn-warning">Verificar</button>
         </div>
      </form>
   </section>
</main>

<?= $this->include('templates/footer') ?>
<?= $this->endSection() ?>