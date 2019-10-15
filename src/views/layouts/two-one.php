<?php
$this->layout('layouts/default', [
    'title' => $title,
]);
?>

<div class="row">
    <div class="span6">
        <?= $this->section('one'); ?>
    </div>
    <div class="span6">
        <?= $this->section('two'); ?>
    </div>
</div>
<div class="row">
    <div class="span12">
        <?= $this->section('three'); ?>
    </div>
</div>
