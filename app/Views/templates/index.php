<?= $this->include('templates/header'); ?>
<!-- kodingan file header yang berada dalam folder templates/ file header -->

<?= $this->include('templates/navbar'); ?>
<!-- kodingan file navbar yang berada dalam folder templates/ file navbar -->

<?= $this->include('templates/sidebar'); ?>
<!-- kodingan file sidebar yang berada dalam folder templates/ file sidebar -->

<?php
//echo $this->renderSection('page-content'); 
if ($page) {
  echo view($page);
}
?>

<?= $this->include('templates/footer'); ?>
<!-- kodingan file footer yang berada dalam folder templates/ file footer -->