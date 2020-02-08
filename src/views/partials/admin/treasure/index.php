<?php
$this->layout('layouts/default', [
    'title' => 'Treasure',
]);
?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Title</th> <th>Location</th> <th>Clue</th> <th>Last Found By</th>
        </tr>
    </thead>
    <tbody>
        <?php if (sizeof($allTreasure) > 0) : ?>
            <?php foreach ($allTreasure as $Treasure) : ?>
                <tr>
                    <td><?= $Treasure->title ?></td>
                    <td><?= $Treasure->location ?></td>
                    <td><?= $Treasure->clue ?></td>
                    <td>
                    <?php if ($Treasure->id) :?>
                        <?= $Treasure->id ?> (<?= $Treasure->phone ?>)
                    <?php else : ?>
                        No One Yet<br />
                    <?php endif; ?>
                        <div class="dropdown">
                            <div class="btn-group" role="group">
                                <a
                                    class="btn btn-secondary"
                                    href="<?= site_url('admin/treasure/view/' . $Treasure->treasure_id) ?>"
                                >
                                    <i class="fas fa-qrcode"></i> View
                                </a>
                                <div class="btn-group" role="group">
                                    <button
                                        type="button"
                                        class="btn btn-secondary dropdown-toggle"
                                        data-toggle="dropdown">

                                    </button>
                                    <div class="dropdown-menu  dropdown-menu-right">
                                        <?=
                                            anchor(
                                                'admin/treasure/view/' . $Treasure->treasure_id . '/pdf',
                                                '<i class="fas fa-fw fa-file"></i> View PDF',
                                                'class="dropdown-item"'
                                            );
                                        ?>
                                        <?=
                                            anchor(
                                                'admin/treasure/edit/' . $Treasure->treasure_id,
                                                '<i class="fas fa-fw fa-edit"></i> Edit',
                                                'class="dropdown-item"'
                                            );
                                        ?>
                                        <?=
                                            anchor(
                                                'admin/treasure/delete/' . $Treasure->treasure_id,
                                                '<i class="fas fa-fw fa-trash"></i> Delete',
                                                'class="dropdown-item"'
                                            );
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4"><p class="center"><em>No Treasure In Database</em></p></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<a
    class="btn btn-success"
    href="<?= site_url('admin/treasure/add') ?>"
>
    <i class="fas fa-plus"></i> Add Treasure
</a>
