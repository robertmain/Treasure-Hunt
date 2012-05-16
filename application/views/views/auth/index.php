<h1>Sign In/Register</h1>
<div class="row">
    <div class="span6">
        <?php if ($this->session->flashdata('autherror')): ?>
            <div class="alert alert-error">
                <?php $error = $this->session->flashdata('autherror') ?>
                <h1 class="alert-heading"><?= $error['title'] ?></h1>
                <p><?= $error['content'] ?></p>
            </div>
        <?php endif; ?>
        <h2>Sign In</h2>
        <?= form_open('auth/authenticate', array('class' => 'form-horizontal')); ?>
        <div class="control-group">
            <label class="control-label" for="login">E-mail Address</label>
            <div class="controls">
                <?= form_input('login', NULL) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <?= form_password('password') ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <?= form_submit('submit', 'Sign In', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <?= form_close() ?>
    </div>
    <div class="span6">
        <h2>Register</h2>
        <?= form_open('auth/createaccount', array('class' => 'form-horizontal')); ?>
        <div class="control-group">
            <label for="forename" class="control-label">Forename</label>
            <div class="controls">
                <?= form_input('forename'); ?>
            </div>
        </div>
        <div class="control-group">
            <label for="surname" class="control-label">Surname</label>
            <div class="controls">
                <?= form_input('surname'); ?>
            </div>
        </div>
        <div class="control-group">
            <label for="email" class="control-label">E-Mail</label>
            <div class="controls">
                <?= form_input('email'); ?>
            </div>
        </div>
        <div class="control-group">
            <label for="phone" class="control-label">Mobile No</label>
            <div class="controls">
                <?= form_input('phone'); ?>
            </div>
        </div>
        <div class="control-group">
            <label for="password" class="control-label">Password</label>
            <div class="controls">
                <?= form_password('password'); ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <?= form_submit('submit', 'Register', 'class="btn btn-primary"') ?>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>