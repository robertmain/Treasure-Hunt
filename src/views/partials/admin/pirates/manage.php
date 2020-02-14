<?php
$this->layout('layouts/default', [
    'title' => 'Pirates',
    'subtitle' => 'Manage Pirate'
]);
?>

<?= form_open('admin/pirates/update', ['class' => 'form-horizontal', 'id' => 'updatePirate']) ?>
<?= form_hidden('id', $Pirate->id) ?>
<div class="form-group">
    <label class="control-label">Phone Number</label>
    <?= form_input('phone', $Pirate->phone, 'maxlength="11" class="form-control" autocomplete="username"') ?>
</div>
<div class="form-group">
    <label class="control-label">Nickname</label>
    <?= form_input('nickname', $Pirate->nickname, 'class="form-control" autocomplete="username"') ?>
</div>
<div class="form-group">
    <label class="control-label">Password</label>
    <?= form_password('password', null, 'class="form-control" autocomplete="new-password"') ?>
    <span><em>(Un-Changed If Left Blank)</em></span>
</div>
<div class="form-group">
    <?php if ($authorisationEnabled->value == '1') : ?>
        <?php if ($Pirate->authorised == '1') : ?>
            <button
                type="button"
                class="btn btn-secondary authorise active"
                data-authorise="0"
                data-id="<?= $Pirate->id ?>"
            >
                De-Authorize Account
            </button>
        <?php else : ?>
            <button
                type="button"
                class="btn btn-secondary authorise"
                data-authorise="1"
                data-id="<?= $Pirate->id ?>"
            >
                Authorize Account
            </button>
        <?php endif; ?>
    <?php endif; ?>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Update Pirate
    </button>
</div>
<?= form_close() ?>

<?php $this->push('scripts'); ?>
<script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/admin-pirates.js')) ?>"></script>
<script>
    document.querySelector('#updatePirate')
        .addEventListener('submit', async (event) => {
            event.preventDefault();
            const { target } = event;

            const formData = new FormData(target);
            const id = formData.get('id');
            formData.delete('id');
            await update(id, Object.fromEntries(formData.entries()));
            return false;
        });

    document.querySelector('.authorise')
        .addEventListener('click', async (event) => {
            event.preventDefault();
            const { target } = event;

            let authorize;
            if(target.classList.contains('active')){
                authorize = false;
                target.classList.remove('active');
                target.textContent = 'Authorize Account';
            } else {
                authorize = true;
                target.classList.add('active');
                target.textContent = 'De-Authorize Account';
            }

            await toggleAuthorization(target.dataset.id, authorize);
            return false;
        });
</script>
<?php $this->end(); ?>
