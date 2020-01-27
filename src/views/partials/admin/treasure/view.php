<?php
$this->layout('layouts/default', [
    'title' => 'Treasure',
    'subtitle' => 'View Treasure',
]);
?>

<div class="row">
    <div class="span10">
        <h2><?= $Treasure->title ?></h2>
        <h4>Location: <?= $Treasure->location ?></h4>
        <h4>Hash: <?= $Treasure->md5 ?></h4>
        <h4>URL: <?= anchor('treasure/find/' . $Treasure->md5) ?></h4>
        <hr>
        <?= auto_typography($Treasure->text) ?>
    </div>
    <div class="span2">
        <img
            src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?= site_url('treasure/find/' . $Treasure->md5); ?>"
            class="thumbnail"
            alt="<?= $Treasure->title; ?>"
        >
    </div>
</div>
