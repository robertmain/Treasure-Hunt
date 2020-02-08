<?php if ($CI->session->flashdata('registerinfo')) : ?>
    <div class="col col-xs-12">
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
    <?= validation_errors() ?>
    <?= form_open('auth/create'); ?>
    <div class="form-group">
        <label for="phone" class="control-label">Mobile No</label>
        <input name="phone" type="tel" value="<?= set_value('phone') ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <?= form_password('password', set_value('password'), 'class="form-control"'); ?>
    </div>
    <div class="form-group">
        <label for="confirmpassword" class="control-label">Confirm Password</label>
        <?= form_password('confirmpassword', set_value('confirmpassword'), 'class="form-control"'); ?>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Regsiter</button>
    </div>
    <?= form_close(); ?>
<?php endif; ?>
