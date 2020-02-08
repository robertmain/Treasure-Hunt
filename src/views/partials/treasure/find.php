<?php
$this->layout('layouts/default', [
    'title' => 'Treasure Found'
]);
?>

<?php
if (isBanned($me->id) && isLoggedIn()) {
    $this->insert('partials::treasure/banned');
}
?>

<?php if ($found == true) : ?>
    <div class="alert">
        <a href="#" data-dismiss="alert" class="close">&times;</a>
        <h3 class="alert-heading">Information</h3>
        <p>You Have Already Discovered This Piece Of Treasure</p>
    </div>
<?php endif; ?>

<?php if (!isLoggedIn()) : ?>
    <div class="alert" style="overflow: hidden">
        <a href="#" data-dismiss="alert" class="close">&times;</a>
        <h3 class="alert-heading">Information</h3>
        <p>It seems you aren't signed in right now. You must be logged in to participate in this treasure hunt.</p>
        <div class="pull-right">
            <a href="<?= site_url('auth') ?>" class="btn "><i class="fas fas-icon-right"></i> Get Started</a>
        </div>
    </div>
<?php endif; ?>

<h2><?= $treasure->title ?></h2>
<div class="alert alert-info">
    <h3 class="alert-heading">Did you know...</h3>
    <p><?= auto_typography($treasure->text) ?></p>
</div>
