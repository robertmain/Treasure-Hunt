<?php
$this->layout('layouts/default', [
    'title' => 'Pirates',
    'subtitle' => 'Manage Pirate'
]);
?>

<?= form_open('admin/pirates/update', ['class' => 'form-horizontal', 'id' => 'updatePirate']) ?>
<?= form_hidden('id', $Pirate->id) ?>
<div class="control-group">
    <label class="control-label">Phone Number</label>
    <div class="controls">
        <?= form_input('phone', $Pirate->phone, 'maxlength="11"') ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Password</label>
    <div class="controls">
        <?= form_password('password', null) ?>
        <p class="help-block">Password Un-Changed If Left Blank</p>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <?php if ($authorisationEnabled->value == '1') : ?>
            <?php if ($Pirate->authorised == '1') : ?>
                <button
                    type="button"
                    class="btn authorise active"
                    data-authorise="0"
                    data-id="<?= $Pirate->id ?>"
                >
                    De-Authorise Account
                </button>
            <?php else : ?>
                <button
                    type="button"
                    class="btn authorise"
                    data-authorise="1"
                    data-id="<?= $Pirate->id ?>"
                >
                    Authorise Account
                </button>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<div class="form-actions">
    <button
        id="submit"
        type="button"
        class="btn btn-success"
    >
        <i class="fas fa-refresh"></i> Update Pirate
    </button>
</div>
<?= form_close() ?>

<?php $this->push('scripts'); ?>
<script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/admin-pirates.js')) ?>"></script>
<script>
    document.querySelector('#submit')
        .addEventListener('click', async () => {
            const formData = new FormData(document.querySelector('#updatePirate'));
            const id = formData.get('id');
            formData.delete('id');
            await updateDetails(id, Object.fromEntries(formData.entries()));
        });

    document.querySelector('.authorise')
        .addEventListener('click', async (event) => {
            const {
                target
            } = event;

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
            event.preventDefault();
        });
</script>
<?php $this->end(); ?>
