<?php
$this->layout('layouts/default', [
    'title' => 'Treasure',
    'subtitle' => 'Delete Treasure',
]);
?>

<div class="alert alert-danger">
    <h2 class="alert-heading">Warning</h2>
    <p>
        You are about to delete the treasure item &quot;<?= $Treasure->title ?>&quot;.
        <strong>This cannot be undone</strong>.
    </p>
    <p>
        Are you sure you wish to continue?
    </p>
    <p>
        <a
            href="<?= site_url('admin/treasure/remove/' . $Treasure->id) ?>"
            class="btn btn-danger"
        >
            Yes, Delete This Piece of Treasure
        </a>
        <a href="<?= site_url('admin/treasure') ?>" class="btn">
            Wait! I changed my mind
        </a>
    </p>
</div>
