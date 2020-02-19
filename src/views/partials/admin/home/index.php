<?php
$this->layout('layouts/two-one', [
    'title' => 'Dashboard',
]);
?>

<?php $this->start('one'); ?>
<h3>Overview</h3>
<table class="table table-bordered table-striped">
    <tr>
        <th>Pirates</th> <td><?= sizeof($registeredUsers) ?></td>
    </tr>
    <tr>
        <th>Total Codes In Database</th> <td><?= sizeof($totalCodesInDatabase) ?></td>
    </tr>
    <tr>
        <th>Average Codes Found Per Pirate</th> <td><?= sizeof($treasure_per_pirate) ?></td>
    </tr>
    <tr>
        <th>Total Codes Found</th> <td><?= sizeof($totalFoundCodes) ?></td>
    </tr>
</table>
<?php $this->end(); ?>

<?php $this->start('two'); ?>
<div class="card">
    <div class="card-header text-center">Signup Metrics</div>    <div class="card-body">
        <h4 class="text-center">Coming Soon...</h4>
    </div>
    <i style="background: linear-gradient(cyan, blue);  -webkit-background-clip: text; -webkit-text-fill-color: transparent;" class="fas fa-chart-line text-center fa-10x"></i>
</div>
<?php $this->end(); ?>

<?php $this->start('three'); ?>
<h3><?= APP_TITLE ?> Activity</h3>
<canvas id="found_treasure"></canvas>
<?php $this->end(); ?>

<?php $this->push('scripts'); ?>
    <script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/admin-dashboard.js')) ?>"></script>
<?php $this->end(); ?>
