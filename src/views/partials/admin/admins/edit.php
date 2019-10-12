<?php $this->layout('layouts/default'); ?>
<div class="row">
    <div class="span12">
        <h1>Administrators <small>Edit Administrator</small></h1>
    </div>
</div>
<div class="row">
    <div class="span12">
        <?= form_open('admin/admins/update', array('class' => 'form-horizontal')) ?>
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
            <label for="username" class="control-label">Username</label>
            <div class="controls">
                <?= form_input('username', $Admin->username, 'class="username"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="password" class="control-label">Password</label>
            <div class="controls">
                <?= form_password('password', NULL, 'class="password"') ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button class="btn btn-primary" id="addadmin" type="submit"><i class="icon-refresh icon-white"></i> Update Admin</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
