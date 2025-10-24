<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<?= $this->include('templates/header') ?>
<main class="container-fluid">
   <section class="my-4">
      <h2><?= esc($title) ?></h2>
      <div class="row">
         <?php foreach ($alerts as $key => $alert): ?>
            <div class="col-md-5 col-lg-4 mb-4">
               <div class="card_alert row">
                  <div class="col-10 card_main">
                     <h6 class="card-title mb-3 text-center"><?= esc($alert->name) ?></h6>
                     <?= esc($alert->action) ?>
                  </div>
                  <div class="col-2 alert_link d-flex flex-column justify-content-center align-items-center item-center">
                     <a href="<?= site_url('detalhes?id=' . $alert->id_plant) ?>" class=" d-flex flex-column justify-content-center align-items-center item-center" />
                     <i class="fa-regular fa-eye"></i>
                     </a>
                  </div>
               </div>

            </div>
         <?php endforeach; ?>
      </div>
   </section>
</main>
<?= $this->include('templates/footer') ?>
<?= $this->endSection('content') ?>