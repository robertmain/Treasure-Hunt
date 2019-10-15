<?php
$this->layout('layouts/two-one', [
    'title' => 'Application Settings',
]);
?>

<ul class="nav nav-tabs settings-tabs">
    <li><a href="#validation" data-toggle="tab">Account Validation</a></li>
    <li><a href="#completion" data-toggle="tab">Treasure Hunt Completion</a></li>
    <li><a href="#eucookiecompliancy" data-toggle="tab">EU Cookie Law Compliancy</a></li>
</ul>

<?php $this->start('one'); ?>
<h3>Account Validation</h3>
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
        <i class="icon-white icon-lock"></i> Authorisation On</button>
    <button
        data-status="0"
        class="btn btn-success authorisation <?= $validationButtons['off']; ?>"
    >
        Authorisation Off
    </button>
</div>
<?php $this->end(); ?>

<?php $this->start('two'); ?>
<h3>EU Cookie Law Compliancy</h3>
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
        <i class="icon-white icon-cog"></i> Cookie Compliancy On
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
    <div class="span6">
        <h3>Treasure Hunt Completion</h3>
        <p>
            You can customise the message that will be shown to the user
            when they complete the treasure hunt and find all the codes.
            See the table on the right for automatic variable substitutions
        </p>
        <form action="#" class="form-horizontal">
            <div class="control-group">
                <label for="completetitle" class="control-label">Title</label>
                <div class="controls">
                    <?= form_input('completetitle', $config[1]->value, 'class="completetitle"') ?>
                </div>
            </div>
            <div class="control-group">
                <label for="completemessage" class="control-label">Message</label>
                <div class="controls">
                    <div
                        class="input completemessage span4"
                        name="completemessage"
                        contenteditable="true"
                    >
                        <?= auto_typography($config[2]->value) ?>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button
                        type="button"
                        class="btn btn-primary updatemessage"
                    >
                        <i class="icon-white icon-refresh"></i> Update Finish Message
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="span6">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Variable</th><th>Replacement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>%TEAMNAME</td> <td><?= TEAMNAME ?></td>
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
<script type="text/javascript">
    const csrfTokenName = '<?= $CI->security->get_csrf_token_name() ?>';
    const csrfHash = '<?= $CI->security->get_csrf_hash() ?>';

    const updateSettings = (key, value) => $.post(
        '/admin/settings/update',
        `key=${key}&value=${value}&${csrfTokenName}=${csrfHash}`
    );

    $('.settings-tabs a:first').tab('show').addClass('active');

    $('.authorisation').click(({ target }) =>
        updateSettings('authorisation', target.getAttribute('data-status')));

    $('.updatemessage').click(() => {
        updateSettings('completetitle', $('.completetitle').val());
        updateSettings('completemessage', $('.completemessage').html());
    });

    $('.eucookielaw').click(({ target }) =>
        updateSettings('cookielaw', target.getAttribute('data-status')));

    $('.completetitle').keyup(() => $('.updatemessage').removeAttr('disabled'));
    $('.completemessage').keyup(() => $('.updatemessage').removeAttr('disabled'));
</script>
<?php $this->end(); ?>
