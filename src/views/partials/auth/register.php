<?php if ($CI->session->flashdata('registerinfo')) : ?>
    <div class="span12">
        <div class="alert alert-success">
            <?php $alert = $CI->session->flashdata('registerinfo') ?>
            <h3 class="alert-heading"><?= $alert['title'] ?></h3>
            <p><?= $alert['content'] ?></p>
        </div>
    </div>
    <?php $this->push('scripts'); ?>
    <script>
        let start = 10;
        const ele = document.querySelector('.seconds');
        ele.textContent = start;
        const interval = setInterval(() => {
            ele.textContent = start;
            if (start === 0) {
                window.location = `${window.location.origin}/treasure`;
                clearInterval(interval);
            }
            start--;
        }, 1000);
    </script>
    <?php $this->end(); ?>
<?php else : ?>
    <div class="span6">
        <?= validation_errors() ?>
        <?= form_open('auth/create', ['class' => 'form-horizontal']); ?>
        <div class="control-group">
            <label for="phone" class="control-label">Mobile No</label>
            <div class="controls">
                <input name="phone" type="tel" value="<?= set_value('phone') ?>" maxlength="11" />
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
<?php endif; ?>
