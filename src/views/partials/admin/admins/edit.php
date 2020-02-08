<?php
$this->layout('layouts/default', [
    'title' => 'Administrators',
    'subtitle' => 'Edit Administrator'
]);
?>

<div class="row">
    <div class="col col-xs-12">
        <?= form_open('admin/admins/update', ['class' => 'form-horizontal']) ?>
        <?= form_hidden('id', $Admin->id) ?>
        <h4>Personal Data</h4>
        <div class="control-group">
            <label for="forename" class="control-label">Forename</label>
            <div class="controls">
                <?= form_input('forename', null, 'class="forename form-control"') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="surname" class="control-label">Surname</label>
            <div class="controls">
                <?= form_input('surname', null, 'class="surname form-control"') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <div class="controls">
                <?= form_input('email', null, 'class="email form-control"') ?>
            </div>
        </div>

        <h4>Account Data</h4>
        <div class="form-group">
            <label for="phone" class="control-label">Phone</label>
            <div class="controls">
                <?= form_input('phone', null, 'class="phone form-control"') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <div class="controls">
                <?= form_password('password', null, 'class="password form-control"') ?>
            </div>
        </div>

        <div class="form-group">
            <div class="controls">
                <button class="btn btn-primary" id="addadmin" type="button">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </div>
    <?= form_close() ?>
    </div>
</div>
