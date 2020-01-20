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
                        No One Yet
                    <?php endif; ?>
                        <div class="btn-group pull-right">
                            <a
                                class="btn"
                                href="<?= site_url('admin/treasure/view/' . $Treasure->treasure_id) ?>"
                            >
                                <i class="icon-qrcode"></i> View
                            </a>
                            <a
                                class="btn dropdown-toggle"
                                data-toggle="dropdown"
                                href="#"
                            >
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <?=
                                        anchor(
                                            'admin/treasure/view/' . $Treasure->treasure_id . '/pdf',
                                            '<i class="icon-file"></i> View PDF'
                                        );
                                    ?>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <?=
                                        anchor(
                                            'admin/treasure/edit/' . $Treasure->treasure_id,
                                            '<i class="icon-pencil"></i> Edit'
                                        );
                                    ?>
                                </li>
                                <li>
                                    <?=
                                        anchor(
                                            'admin/treasure/delete/' . $Treasure->treasure_id,
                                            '<i class="icon-trash"></i> Delete'
                                        );
                                    ?>
                                </li>
                            </ul>
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
    <i class="icon-plus icon-white"></i> Add Treasure
</a>
