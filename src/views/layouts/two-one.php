<?php
$this->layout('layouts/default', [
    'title' => $title,
]);
?>

<div class="row">
    <div class="span6">
        <?= $this->section('one'); ?>
    </div>
    <div class="span6<?= (!$this->section('one')) ? ' offset6' : '' ?>">
        <?= $this->section('two'); ?>
    </div>
</div>

<?php if ($this->section('three')) : ?>
<div class="row">
    <div class="span12">
        <?= $this->section('three'); ?>
    </div>
</div>
<?php endif; ?>
