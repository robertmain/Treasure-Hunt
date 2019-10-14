<?php $this->layout('layouts/default'); ?>

<?= form_open('admin/login/auth', array('class' => 'form-horizontal')) ?>
<div id="Modal" class="modal">
    <div class="modal-header">
        <h1>Authentication Required</h1>
    </div>
    <div class="modal-body">
        <?php if ($CI->session->flashdata('autherror')) : ?>
            <?php $Alert = $CI->session->flashdata('autherror') ?>
            <div class="alert alert-error">
                <h1 class="alert-heading"><?= $Alert['title'] ?></h1>
                <p><?= $Alert['content'] ?></p>
            </div>
        <?php endif; ?>
        <div class="control-group">
            <label for="username" class="control-label">Username</label>
            <div class="controls">
                <?= form_input('username', null, 'autofocus="autofocus" ') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="password" class="control-label">Password</label>
            <div class="controls">
                <?= form_password('password') ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?= form_submit('submit', 'Authenticate', 'class="btn btn-primary"') ?>
    </div>
</div>
<?= form_close() ?>
