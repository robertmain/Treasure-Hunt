<h1>Treasure Found</h1>
<?php if ($found == TRUE): ?>
    <div class="alert">
        <a href="#" data-dismiss="alert" class="close">&times;</a>
        <h3 class="alert-heading">Information</h3>
        <p>You Have Already Discovered This Piece Of Treasure</p>
    </div>
<?php endif; ?>

<?php if (!isLoggedIn()): ?>
    <div class="alert" style="overflow: hidden">
        <a href="#" data-dismiss="alert" class="close">&times;</a>
        <h3 class="alert-heading">Information</h3>
        <p>It seems you aren't signed in right now. You must be logged in to participate in this treasure hunt.</p>
        <div class="pull-right">
            <a href="<?= site_url('auth/login') ?>" class="btn "><i class="icon-lock"></i> Sign In</a>
            <a href="<?= site_url('auth/register') ?>" class="btn"><i class="icon-user"></i> Sign Up</a>
        </div>
    </div>
<?php endif; ?>

<h2><?= $Treasure->title ?></h2>
<div class="alert alert-info">
    <h3 class="alert-heading">Did you know...</h3>
    <p><?= auto_typography($Treasure->text) ?></p>
</div>
