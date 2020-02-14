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
            <?= form_input('forename', $Admin->forename, 'class="forename form-control"') ?>
        </div>

        <div class="form-group">
            <label for="surname" class="control-label">Surname</label>
            <?= form_input('surname', $Admin->surname, 'class="surname form-control"') ?>
        </div>

        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <?= form_input('email', $Admin->email, 'class="email form-control"') ?>
        </div>

        <h4>Account Data</h4>
        <div class="form-group">
            <label for="phone" class="control-label">Phone</label>
            <?= form_input('phone', $Admin->phone, 'class="phone form-control"') ?>
        </div>

        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <?= form_password('password', null, 'class="password form-control"') ?>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" id="addadmin" type="submit">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    <?= form_close() ?>
    </div>
</div>
