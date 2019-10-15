<?php
$this->layout('layouts/default', [
    'title' => 'Pirates',
    'subtitle' => 'Manage Pirate'
]);
?>

<?= form_open('admin/pirates/update', ['class' => 'form-horizontal']) ?>
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
        type="submit"
        class="btn btn-success"
    >
        <i class="icon-white icon-refresh"></i> Update Pirate
    </button>
</div>
<?= form_close() ?>

<script type="text/javascript">
    $('.authorise').click(function(){
        var clicked = $(this);
        if(clicked.hasClass('active')){
            var action = 'deauthorise';
            clicked.removeClass('active');
            clicked.html('Authorise Account');
        }
        else{
            var action = 'authorise';
            clicked.addClass('active');
            clicked.html('De-Authorise Account');
        }
        $.ajax({
            url: '<?= site_url('admin/pirates') ?>/' + action + '/' + clicked.attr('data-id'),
            error: function(xhr, status, error) {
                console.log(error);
            },
        });
        event.preventDefault();
    });
</script>
