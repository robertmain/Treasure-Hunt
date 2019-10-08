<?php $this->layout('layouts/default'); ?>
<div class="row">
    <div class="span12">
        <h1>Treasure <small>Delete Treasure</small></h1>
    </div>
</div>
<div class="row">
    <div class="span12">
        <div class="alert alert-danger">
            <h2 class="alert-heading">Warning</h2>
            <p>You are about to delete the treasure item &quot;<?= $Treasure->title ?>&quot;. <strong>This cannot be undone</strong>.</p>
            <p>Are you sure you wish to continue?</p>
            <p><a href="<?= site_url('admin/treasure/remove/' . $Treasure->id) ?>" class="btn btn-danger">Yes, Delete This Piece of Treasure</a> <a href="<?= site_url('admin/treasure') ?>" class="btn">Wait! I changed my mind</a></p>
        </div>
    </div>
</div>
