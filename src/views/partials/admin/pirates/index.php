<?php
$this->layout('layouts/default', [
    'title' => 'Pirates',
]);
?>

<div id="stripTreasureModal" class="modal hide fade">
    <div class="modal-header">
        <h2><?= APP_TITLE ?> <small>Strip Pirate Treasure</small></h2>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <h3 class="alert-heading">Warning</h3>
            <p>You are about to remove all treasure found by this pirate.</p>
            <p>
                <strong>
                    This cannot be un-done, cancelled or taken back after this point
                </strong>
            </p>
            <p>Are you sure you want to continue?</p>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-success" data-dismiss="modal">No - Go Back</a>
        <a href="#" class="btn btn-danger striptreasure2">
            <i class="icon-white icon-warning-sign"></i> Yes - Strip This Pirate's Treasure
        </a>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th> <th>Pirate</th> <th>Treasure Found</th> <th colspan="2">Joined</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mytreasures as $Mytreasure) : ?>
            <tr id="pirate<?= $Mytreasure->p_id ?>">
                <td> <?= $Mytreasure->p_id ?> </td>
                <td class="phone">
                    <?= $Mytreasure->phone ?>
                    <?php if (isBanned($Mytreasure->p_id)) : ?>
                        <span class="label label-important">Banned</span>
                    <?php endif; ?>
                </td>
                <td class="treasure"><?= $Mytreasure->treasures ?></td>
                <td>
                    <?=
                        DateTime::createFromFormat(
                            MYSQL_DATETIME,
                            $Mytreasure->created_at
                        )->format(LONG_DATETIME)
                    ?>
                </td>
                <td>
                    <div class="btn-group">
                        <a
                            class="btn dropdown-toggle"
                            data-toggle="dropdown"
                            href="#"
                        >
                            <i class="icon-user"></i>
                            Pirate <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <?php if (isBanned($Mytreasure->p_id)) : ?>
                                <li>
                                    <a
                                        href=""
                                        data-id="<?= $Mytreasure->p_id ?>"
                                        class="unban"
                                    >
                                        <i class="icon-ok"></i> Un-Ban
                                    </a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a
                                        href=""
                                        data-id="<?= $Mytreasure->p_id ?>"
                                        class="ban"
                                    >
                                        <i class="icon-ban-circle"></i> Ban
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a
                                    href="#stripTreasureModal"
                                    class="striptreasure1"
                                    data-id="<?= $Mytreasure->p_id ?>"
                                    data-toggle="modal"
                                >
                                    <i class="icon-gift"></i> Strip Treasure
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a
                                    href="<?= site_url('admin/pirates/manage/' . $Mytreasure->p_id) ?>"
                                >
                                    <i class="icon-edit"></i> Manage Pirate
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $this->push('scripts'); ?>
<script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/admin-pirates.js')) ?>"></script>
<script>
    $('tr').on('click', '.ban', async (event) => {
        const { target } = event;

        await updateDetails(target.dataset.id, { banned: '0' });
        target.classList.remove('ban');
        target.classList.add('unban');

        const bannedTag = document.createElement('span');
        bannedTag.classList.add(['label', 'label-important']);
        bannedTag.innerText = 'Banned';

        target.closest('tr')
            .querySelector('td.phone')
            .appendChild(bannedTag);

        target.innerHTML = '<i class="icon-ok"></i> Un-Ban</a>';
        event.preventDefault();
    });

    $('tr').on('click', '.striptreasure1', ({ target, preventDefault }) => {
        $.get(
            `/admin/pirates/get/${target.getAttribute('data-id')}`,
            () => {
                $('#stripTreasureModal')
                    .find('.striptreasure2')
                    .attr('data-id', id);
            }
        )
        preventDefault();
    });

    $('.striptreasure2').click(({ target, preventDefault }) => {
        const pirateId = target.getAttribute('data-id');
        $.get(
            `/admin/pirates/strip_treasure/${pirateId}`,
            () => {
                $('table')
                    .find('#pirate' + pirateId)
                    .find('.treasure').text(0);

                $('#stripTreasureModal').modal('hide');
            }
        )
        preventDefault();
    });
</script>
<? $this->end(); ?>
