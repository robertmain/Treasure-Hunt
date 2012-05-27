<div class="row">
    <div class="span12">
        <h1>Treasure</h1>
    </div>
</div>
<div class="row">
    <div class="span12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th> <th>Location</th> <th>Clue</th><th>Last Found By</th>
                </tr>
            </thead>
            <tbody>
                <?php if (sizeof($allTreasure) > 0): ?>
                    <?php foreach ($allTreasure as $Treasure): ?>
                        <tr>
                            <td><?= $Treasure->title ?></td>
                            <td><?= $Treasure->location ?></td>
                            <td><?= $Treasure->clue ?></td> 
                            <?php if($Treasure->id):?>
                            <td colspan="2"><?= $Treasure->id ?> (<?= $Treasure->phone ?>)</td> 
                            <?php else: ?>
                            <td colspan="2"> No One Yet</td> 
                            <?php endif; ?>
                            <td>
                                <div class="btn-group">
                                    <a class="btn" href="<?= site_url('admin/treasure/view/' . $Treasure->treasure_id) ?>"><i class="icon-qrcode"></i> Treasure</a>
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= site_url('admin/treasure/view/' . $Treasure->treasure_id) ?>"><i class="icon-eye-open"></i> View</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?= site_url('admin/treasure/edit/' . $Treasure->treasure_id) ?>"><i class="icon-pencil"></i> Edit</a></li>
                                        <li><a href="<?= site_url('admin/treasure/delete/' . $Treasure->treasure_id) ?>"><i class="icon-trash"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3"><p class="center"><em>No Treasure In Database</em></p></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="<?= site_url('admin/treasure/add') ?>"><i class="icon-plus icon-white"></i> Add Treasure</a>
    </div>
</div>