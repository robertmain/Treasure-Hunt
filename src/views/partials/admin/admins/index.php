<?php
$this->layout('layouts/default', [
    'title' => 'Adminstrators',
]);
?>

<div class="modal fade in" id="newAdmin" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Administrator</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(null, ['class' => 'form-horizontal']) ?>
                    <h4>Personal Data</h4>
                    <div class="control-group">
                        <label for="forename" class="control-label">Forename</label>
                        <div class="controls">
                            <?= form_input('forename', null, 'class="forename form-control"') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="surname" class="control-label">Surname</label>
                        <div class="controls">
                            <?= form_input('surname', null, 'class="surname form-control"') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <div class="controls">
                            <?= form_input('email', null, 'class="email form-control"') ?>
                        </div>
                    </div>

                    <h4>Account Data</h4>
                    <div class="form-group">
                        <label for="phone" class="control-label">Phone</label>
                        <div class="controls">
                            <?= form_input('phone', null, 'class="phone form-control"') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <div class="controls">
                            <?= form_password('password', null, 'class="password form-control"') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <button class="btn btn-primary" id="addadmin" type="button">
                                <i class="fas fa-plus"></i> Add Admin
                            </button>
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped" id="admins">
    <thead>
        <tr>
            <th>Name</th> <th colspan="2">Phone</th>
        </tr>
    </thead>
    <tbody>
        <?php if (sizeof($admins) > 0) : ?>
            <?php foreach ($admins as $Admin) : ?>
                <tr>
                    <td><?= $Admin->forename . ' ' . $Admin->surname ?></td>
                    <td>
                        <?= $Admin->phone ?>
                        
                        <div class="btn-group float-sm-right">
                            <a
                                class="btn btn-secondary dropdown-toggle"
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
