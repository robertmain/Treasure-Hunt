<?php $this->layout('layouts/default'); ?>

<div id="newAdmin" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close" data-dismiss="modal">&times;</a>
        <h2>Add Administrator</h2>
    </div>
    <div class="modal-body">
        <?= form_open(null, array('class' => 'form-horizontal')) ?>
        <h3>Personal Data</h3>
        <div class="control-group">
            <label for="forename" class="control-label">Forename</label>
            <div class="controls">
                <?= form_input('forename', null, 'class="forename"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="surname" class="control-label">Surname</label>
            <div class="controls">
                <?= form_input('surname', null, 'class="surname"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="email" class="control-label">Email</label>
            <div class="controls">
                <?= form_input('email', null, 'class="email"') ?>
            </div>
        </div>
        <h3>Account Data</h3>
        <div class="control-group">
            <label for="username" class="control-label">Username</label>
            <div class="controls">
                <?= form_input('username', null, 'class="username"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="password" class="control-label">Password</label>
            <div class="controls">
                <?= form_password('password', null, 'class="password"') ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button
                    class="btn btn-primary"
                    data-dismiss="modal"
                    id="addadmin"
                    type="button"
                >
                    <i class="icon-plus icon-white"></i> Add Admin
                </button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
<div class="row">
    <div class="span12">
        <h1>Administrators</h1>
    </div>
</div>
<div class="row">
    <div class="span12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th> <th>Username</th> <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (sizeof($admins) > 0) : ?>
                    <?php foreach ($admins as $Admin) : ?>
                        <tr>
                            <td><?= $Admin->forename . ' ' . $Admin->surname ?></td>
                            <td><?= $Admin->username ?></td>
                            <td>
                                <div class="btn-group">
                                    <a
                                        class="btn dropdown-toggle"
                                        data-toggle="dropdown"
                                        href="#"
                                    >
                                        <i class="icon-user"></i> Admin <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <?=
                                                anchor(
                                                    'admin/admins/edit/' . $Admin->id,
                                                    '<i class="icon-pencil"></i> Edit'
                                                );
                                            ?>
                                        </li>
                                        <?php if (sizeof($admins) > 1) : ?>
                                        <li>
                                            <?=
                                                anchor(
                                                    'admin/admins/delete/' . $Admin->id,
                                                    '<i class="icon-trash"></i> Delete'
                                                );
                                            ?>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3"><p class="center"><em>No Admins In Database</em></p></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a
            data-toggle="modal"
            href="#newAdmin"
            class="btn btn-success"
        >
            <i class="icon-plus icon-white"></i> Add Admin
        </a>
    </div>
</div>

<script type="text/javascript">
    $('#addadmin').on('click', function () {
        const forenameField = $('.forename');
        const surnameField = $('.surname');
        const emailField = $('.email');
        const passwordField = $('.password');
        const usernameField = $('.username');
        $.ajax({
            url: '<?= site_url('admin/admins/create') ?>',
            data: [
                forenameField,
                surnameField,
                emailField,
                passwordField,
                usernameField,
            ].map((field) => ({key: field.attr('name'), value: field.val()}))
                .concat({
                    key: '<?= $CI->security->get_csrf_token_name(); ?>',
                    value: '<?= $CI->security->get_csrf_hash() ?>',
                })
                .map(({key, value}) => `${key}=${value}`)
                .join('&'),
            type:'POST',
            dataType:'json',
            error: ({status}, error, errorThrown) =>
                console.error(`${status}: ${errorThrown}`),
            success: function(admins) {
                const adminRows = admins.map(
                    ({forename, surname, username, id}) => {
                        return `<tr>
                            <td>${forename} ${surname}</td>
                            <td>${username}</td>
                            <td>
                                <div class="btn-group">
                                    <a
                                        class="btn dropdown-toggle"
                                        data-toggle="dropdown" href="#"
                                    >
                                        <i class="icon-user"></i>
                                        Admin <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a
                                                href="<?= base_url('/admin/admins/edit/') ?>${id}"
                                            >
                                                <i class="icon-pencil" ></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="<?= base_url('/admin/admins/delete/') ?>${id}"
                                            >
                                                <i class="icon-trash"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>`
                    }
                );

                $('tbody')
                    .empty()
                    .append(...adminRows)
                    .fadeIn(1500);
                [
                    forenameField,
                    surnameField,
                    emailField,
                    passwordField,
                    usernameField,
                ].forEach(field => field.val(null));
            }
        });
    });
</script>
