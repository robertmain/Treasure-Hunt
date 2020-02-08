<?php if ($CI->session->flashdata('autherror')) : ?>
    <div class="alert alert-error">
        <?php $error = $CI->session->flashdata('autherror') ?>
        <h3 class="alert-heading"><?= $error['title'] ?></h3>
        <p><?= $error['content'] ?></p>
    </div>
<?php endif; ?>
<?= form_open('auth/authenticate'); ?>
<div class="form-group">
    <label class="control-label" for="login">Mobile No</label>
    <input name="login" class="form-control" type="tel"/>
</div>
<div class="form-group">
    <label class="control-label" for="password">Password</label>
    <?= form_password('password', '', 'class="form-control"') ?>
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Sign In</button>
</div>
<?= form_close() ?>
