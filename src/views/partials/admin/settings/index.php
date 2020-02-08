<?php
$this->layout('layouts/two-one', [
    'title' => 'Settings',
]);
?>

<?php $this->start('one'); ?>
<h4>Account Validation</h4>
<p>
    The system can require users to validate their account by contacting
    a member of staff. To turn this on or off use the button below
</p>
<div class="btn-group" data-toggle="buttons-radio">
    <?php
    if ($config[0]->value == '1') {
        $validationButtons['on'] = 'active';
        $validationButtons['off'] = null;
    } else {
        $validationButtons['on'] = null;
        $validationButtons['off'] = 'active';
    }
    ?>
    <button
        data-status="1"
        class="btn btn-success authorisation <?= $validationButtons['on']; ?>"
    >
        <i class="fas fa-lock"></i> Authorisation On</button>
    <button
        data-status="0"
        class="btn btn-success authorisation <?= $validationButtons['off']; ?>"
    >
        Authorisation Off
    </button>
</div>
<?php $this->end(); ?>

<?php $this->start('two'); ?>
<h4>EU Cookie Law Compliancy</h4>
<p>
    Should the application comply with EU Cookie law and ask permission to use
    cookies?
    <strong>Note:</strong> If you (and all your users) are outside the EU, you
    can savely disable this.
</p>
<div class="btn-group" data-toggle="buttons-radio">
    <?php
    if ($config[3]->value == '1') {
        $cookielawbutton['on'] = 'active';
        $cookielawbutton['off'] = null;
    } else {
        $cookielawbutton['on'] = null;
        $cookielawbutton['off'] = 'active';
    }
    ?>
    <button
        data-status="1"
        class="btn btn-success eucookielaw <?= $cookielawbutton['on'] ?>"
    >
        <i class="fas fa-cog"></i> Cookie Compliancy On
    </button>
    <button
        data-status="0"
        class="btn btn-success eucookielaw <?= $cookielawbutton['off'] ?>"
    >
        Cookie Compliancy Off
    </button>
</div>
<?php $this->end(); ?>

<?php $this->start('three'); ?>
<div class="row">
    <div class="col col-xs-6">
        <h4>Treasure Hunt Completion</h4>
        <p>
            You can customise the message that will be shown to the user
            when they complete the treasure hunt and find all the codes.
            See the table on the right for automatic variable substitutions
        </p>
        <form action="#" class="form-horizontal">
            <div class="form-group">
                <label for="completetitle" class="control-label">Title</label>
                <?= form_input('completetitle', $config[1]->value, 'class="completetitle form-control"') ?>
            </div>
            <div class="form-group">
                <label for="completemessage" class="control-label">Message</label>
                <div
                    class="input completemessage form-control"
                    name="completemessage"
                    contenteditable="true"
                >
                    <?= auto_typography($config[2]->value) ?>
                </div>
            </div>
            <div class="form-group">
                <div class="controls">
                    <button
                        type="button"
                        class="btn btn-primary updatemessage"
                    >
                        <i class="fas fa-sync"></i> Update Finish Message
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col col-xs-6">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Variable</th><th>Replacement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>%APP_OWNER</td> <td><?= APP_OWNER ?></td>
                </tr>
                <tr>
                    <td>%NCODES</td>
                    <td>
                        Number of QR Codes in the database (currently <?= $amountoftreasure ?>)
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $this->end(); ?>

<?php $this->push('scripts'); ?>
<script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/admin-settings.js')) ?>"></script>
<?php $this->end(); ?>
