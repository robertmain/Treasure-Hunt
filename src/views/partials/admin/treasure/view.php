<?php
$this->layout('layouts/default', [
    'title' => 'Treasure',
    'subtitle' => 'View Treasure',
]);
?>

<div class="row">
    <div class="col col-xs-12 col-md-2">
        <img
            src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=<?= site_url('treasure/find/' . $Treasure->md5); ?>"
            class="img-thumbnail"
            alt="<?= $Treasure->title; ?>"
        >
    </div>
    <div class="col col-xs-12 col-md-10">
        <h4><?= $Treasure->title ?></h4>
        <p>
            <strong>Location:</strong> <?= $Treasure->location ?><br />
        </p>
        <p>
            <strong>URL:</strong> <?= anchor('treasure/find/' . $Treasure->md5, 'treasure/find/' . $Treasure->md5) ?><br />
        </p>
        <p>
            <strong>Clue:</strong> <?= $Treasure->clue ?>
        </p>
    </div>
</div>
<div class="row mt-5">
    <div class="col col-xs-12">
        <?= auto_typography($Treasure->text) ?>
    </div>
</div>
