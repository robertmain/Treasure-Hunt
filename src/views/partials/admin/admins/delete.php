<?php
$this->layout('layouts/default', [
    'title' => 'Adminstrators',
    'subtitle' => 'Delete Administrator'
]);
?>

<div class="row">
    <div class="col col-xs-12">
        <div class="alert alert-danger">
            <h2 class="alert-heading">Warning</h2>
            <p>
                You are about to delete the Administrator &quot;
                <?= $Admin->forename . ' ' . $Admin->surname ?>&quot;.
                <strong>This cannot be undone</strong>.
            </p>
            <p>Are you sure you wish to continue?</p>
            <p>
                <a
                    href="<?= site_url('admin/admins/remove/' . $Admin->id) ?>"
                    class="btn btn-danger"
                >
                    Yes, Delete This Administrator
                </a>
                <a href="<?= site_url('admin/admins') ?>" class="btn">
                    Wait! I changed my mind
                </a>
            </p>
        </div>
    </div>
</div>
