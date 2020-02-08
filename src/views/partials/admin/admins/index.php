<?php
$this->layout('layouts/default', [
    'title' => 'Adminstrators',
]);
?>

<div id="newAdmin" class="modal hide fade">
    <div class="modal-header">
        <a href="#" class="close" data-dismiss="modal">&times;</a>
        <h2>Add Administrator</h2>
    </div>
    <div class="modal-body">
        <?= form_open(null, ['class' => 'form-horizontal']) ?>
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
            <label for="phone" class="control-label">Phone</label>
            <div class="controls">
                <?= form_input('phone', null, 'class="phone"') ?>
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
<table class="table table-bordered table-striped" id="admins">
    <thead>
        <tr>
            <th>Name</th> <th>Phone</th> <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if (sizeof($admins) > 0) : ?>
            <?php foreach ($admins as $Admin) : ?>
                <tr>
                    <td><?= $Admin->forename . ' ' . $Admin->surname ?></td>
                    <td><?= $Admin->phone ?></td>
                    <td>
                        <div class="btn-group">
                            <a
                                class="btn dropdown-toggle"
                                data-toggle="dropdown"
                                href="#"
                            >
                                <i class="fas fa-user"></i> Admin <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <?=
                                        anchor(
                                            'admin/admins/edit/' . $Admin->id,
                                            '<i class="fas fa-pencil"></i> Edit'
                                        );
                                    ?>
                                </li>
                                <?php if (sizeof($admins) > 1) : ?>
                                <li>
                                    <?=
                                        anchor(
                                            'admin/admins/delete/' . $Admin->id,
                                            '<i class="fas fa-trash"></i> Delete'
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
<a data-toggle="modal" href="#newAdmin" class="btn btn-success">
    <i class="fas fa-plus"></i> Add Admin
</a>

<?php $this->push('scripts'); ?>
<script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/admin-admins.js')) ?>"></script>
<?php $this->end(); ?>
