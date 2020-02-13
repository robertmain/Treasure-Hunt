<?php
$this->layout('layouts/default', [
    'title' => 'Pirates',
]);
?>





<div class="modal fade" id="stripTreasureModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4><?= APP_TITLE ?> - <small>Strip Pirate Treasure</small></h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h4 class="alert-heading">Warning</h4>
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
                    <i class="fas fa-exclamation-triangle"></i> Yes - Strip This Pirate's Treasure
                </a>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th> <th>Pirate</th> <th>Treasure Found</th> <th>Joined</th>
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
                    <div class="btn-group float-sm-right">
                        <a
                            class="btn btn-secondary dropdown-toggle"
                            data-toggle="dropdown"
                            href="#"
                        >
                            <i class="fas fa-fw fa-user"></i>
                            Pirate <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <?php if (isBanned($Mytreasure->p_id)) : ?>
                                <li>
                                    <a
                                        href=""
                                        data-id="<?= $Mytreasure->p_id ?>"
                                        class="unban"
                                    >
                                        <i class="fas fa-fw fa-check"></i> Un-Ban
                                    </a>
                                </li>
                            <?php else : ?>
                                <a
                                    href=""
                                    data-id="<?= $Mytreasure->p_id ?>"
                                    class="ban dropdown-item"
                                >
                                    <i class="fas fa-fw fa-ban"></i> Ban
                                </a>
                            <?php endif; ?>
                            <a
                                href="#stripTreasureModal"
                                class="striptreasure1 dropdown-item"
                                data-id="<?= $Mytreasure->p_id ?>"
                                data-toggle="modal"
                            >
                                <i class="fas fa-fw fa-qrcode"></i> Strip Treasure
                            </a>
                            <li class="divider"></li>
                            <a
                                href="<?= site_url('admin/pirates/manage/' . $Mytreasure->p_id) ?>"
                                class="dropdown-item"
                            >
                                <i class="fas fa-fw fa-edit"></i> Manage Pirate
                            </a>
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

        await update(target.dataset.id, { banned: '0' });
        target.classList.remove('ban');
        target.classList.add('unban');

        const bannedTag = document.createElement('span');
        bannedTag.classList.add(['label', 'label-important']);
        bannedTag.innerText = 'Banned';

        target.closest('tr')
            .querySelector('td.phone')
            .appendChild(bannedTag);

        target.innerHTML = '<i class="fas fa-check"></i> Un-Ban</a>';
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
