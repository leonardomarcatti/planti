<!doctype html>
<html>
   <?php
      $pager = \Config\Services::pager();
   ?>

   <?= $this->include('templates/top') ?>

<body>
   <?= $this->include('templates/header') ?>
   <?= $this->renderSection('content') ?>
   <?= $this->include('templates/footer'); ?>
</body>

</html>