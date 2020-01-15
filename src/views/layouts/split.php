<?php
$this->layout('layouts/two-one', [
    'title' => $title,
]);
?>

<?php if ($this->section('left')) : ?>
    <?php $this->start('one'); ?>
        <?= $this->section('left'); ?>
    <?php $this->end(); ?>
<?php endif; ?>

<?php if ($this->section('right')) : ?>
    <?php $this->start('two'); ?>
        <?= $this->section('right'); ?>
    <?php $this->end(); ?>
<?php endif;
