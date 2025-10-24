<!doctype html>
<html>

<?php
$pager = \Config\Services::pager();
?>

<head>
   <meta charset="UTF-8" http-equiv="content-type" content="text/html">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
   <link rel="icon" href="<?= base_url('assets/img/plant.png') ?>" type="image/png" sizes="16x16">
   <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous" defer></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" defer></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous" defer></script>
   <script src="https://kit.fontawesome.com/ec29234e56.js" crossorigin="anonymous" defer></script>
   <script src="<?= base_url('assets/js/script.js') ?>" defer></script>
   <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
   <title><?= esc($tab) ?></title>
</head>

<body>
   <?= $this->renderSection('header') ?>
   <?= $this->renderSection('content') ?>
   <?= $this->renderSection('footer') ?>
</body>

</html>