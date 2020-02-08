<?php
$this->layout('layouts/default', [
    'title' => $title,
]);
?>

<div class="row">
    <div class="col col-xs-6">
        <?= $this->section('one'); ?>
    </div>
    <div class="col col-xs-6 <?= (!$this->section('one')) ? ' col-offset-6' : '' ?>">
        <?= $this->section('two'); ?>
    </div>
</div>

<?php if ($this->section('three')) : ?>
<div class="row mt-5">
    <div class="col col-xs-12">
        <?= $this->section('three'); ?>
    </div>
</div>
<?php endif; ?>
