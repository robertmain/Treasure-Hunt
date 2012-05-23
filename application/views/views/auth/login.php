<h1>Sign In</h1>
<div class="row">
    <div class="span12">
        <?php if($this->session->flashdata('autherror')): ?>
            <div class="alert alert-error">
                <?php $error = $this->session->flashdata('autherror') ?>
                <h3 class="alert-heading"><?= $error['title'] ?></h3>
                <p><?= $error['content'] ?></p>
            </div>
        <?php endif; ?>
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
</div>