<?php
$this->layout('layouts/default', [
    'title' => 'Administrators',
    'subtitle' => 'Edit Administrator'
]);
?>

<div class="row">
    <div class="span12">
        <?= form_open('admin/admins/update', ['class' => 'form-horizontal']) ?>
        <?= form_hidden('id', $Admin->id) ?>
        <h3>Personal Data</h3>
        <div class="control-group">
            <label for="forename" class="control-label">Forename</label>
            <div class="controls">
                <?= form_input('forename', $Admin->forename, 'class="forename"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="surname" class="control-label">Surname</label>
            <div class="controls">
                <?= form_input('surname', $Admin->surname, 'class="surname"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="email" class="control-label">Email</label>
            <div class="controls">
                <?= form_input('email', $Admin->email, 'class="email"') ?>
            </div>
        </div>
        <h3>Account Data</h3>
        <div class="control-group">
            <label for="phone" class="control-label">Phone</label>
            <div class="controls">
                <?= form_input('phone', $Admin->phone, 'class="phone"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="password" class="control-label">Password</label>
            <div class="controls">
                <?= form_password('password', null, 'class="password"') ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button class="btn btn-primary" id="addadmin" type="button">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
