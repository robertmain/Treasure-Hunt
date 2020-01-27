<?php
$this->layout('layouts/default', [
    'title' => 'My Treasure',
]);
?>

<?php
if (isBanned($me->id) && isLoggedIn()) {
    $this->insert('partials::treasure/banned');
}
?>

<?php if (sizeof($treasure) > 0) : ?>
    <div id="foundAllModal" class="modal hide fade" style="display: none; ">
        <div class="modal-header">
            <h3><?= $foundAllTitle ?></h3>
        </div>
        <div class="modal-body">
            <p><?= auto_typography($foundAllMessage) ?></p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary dismiss" data-dismiss="modal">Close</a>
        </div>
    </div>
<?php endif; ?>
<?php if (foundAll($me->id)) : ?>
    <script>
        const COOKIE_NAME = 'foundMessageSeen';
        if(!getCookie(COOKIE_NAME)){
            $(document).ready(() => $('#foundAllModal')
                .modal('show')
                .find('.dismiss').click(({ target }) => {
                    setCookie(COOKIE_NAME, true, 365);
                    $(target).parents('.modal').modal('hide')
                }));
        }
    </script>
<?php else : ?>
    <script>
        delCookie("foundMessageSeen");
    </script>
<?php endif; ?>
<table class="table table-bordered table-striped table-condensed">
    <thead>
        <tr>
            <th>Title</th> <th>Status</th>
        </tr>
    </thead>
    <?php if (sizeof($treasure) > 0) : ?>
        <div class="modal hide fade found-treasure-modal">
            <div class="modal-header"><h3></h3></div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary" data-dismiss="modal">
                    Close
                </a>
            </div>
        </div>

        <tbody>
            <?php foreach ($treasure as $Treasure) : ?>
                <tr>
            <td>
                <span>
                    <?= $Treasure->title ?><br />
                    <?php if (isFound($Treasure->id, $me->id)) : ?>
                        <em><?= $Treasure->location ?></em>
                    <?php endif; ?>
                </span>
            </td>
            <td>
                <?php if (isFound($Treasure->id, $me->id)) : ?>
                    <span class="label label-success">Found</span>
                <?php else : ?>
                    <span class="label">Not Found</span>
                    <a
                        data-toggle="modal"
                        data-id="<?= $Treasure->id; ?>"
                        data-title="<?= $Treasure->title; ?>"
                        data-clue="<?= $Treasure->clue; ?>"
                        class="btn btn-info btn-mini"
                    >
                        Clue
                    </a>
                    <script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/treasure.js')); ?>"></script>
                <?php endif; ?>
            </td>
        </tr>
            <?php endforeach; ?>
    </tbody>
    <?php else : ?>
    <tr>
        <td colspan="2">
            <p class="center">
                <em>There Is Currently No Treasure In The Database</em>
            </p>
        </td>
    </tr>
    <?php endif; ?>
</table>
