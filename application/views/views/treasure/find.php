<?php if ($found == TRUE): ?>
    <div class="alert">
        <h1 class="alert-heading">Error</h1>
        <p>You Have Already Found This Piece Of Treasure</p>
        <a href="<?= site_url('treasure') ?>" class="btn btn-warning">Touch To Go Back</a>
    </div>
<?php else: ?>
    <h1>Treasure Found!</h1>
    <h2><?= $Treasure->title ?></h2>
    <p><?= auto_typography($Treasure->text) ?></p>
<?php endif; ?>