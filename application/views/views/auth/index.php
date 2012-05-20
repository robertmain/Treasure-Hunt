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
            <label class="control-label" for="login">Mobile No</label>
            <div class="controls">
                <input name="login" type="tel" maxlength="11" />
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
        <?= validation_errors() ?>
        <?= form_open('auth/register', array('class' => 'form-horizontal')); ?>
        <div class="control-group">
            <label for="phone" class="control-label">Mobile No</label>
            <div class="controls">
                <input name="phone" type="tel" maxlength="11" />
            </div>
        </div>
        <div class="control-group">
            <label for="password" class="control-label">Password</label>
            <div class="controls">
                <?= form_password('password', set_value('password')); ?>
            </div>
        </div>
        <div class="control-group">
            <label for="confirmpassword" class="control-label">Confirm Password</label>
            <div class="controls">
                <?= form_password('confirmpassword', set_value('confirmpassword')); ?>
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