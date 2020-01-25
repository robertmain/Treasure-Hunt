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
    <script type="text/javascript">
        if((!getCookie("foundMessageSeen")) | (getCookie('foundMessageSeen') == undefined)){
            $(document).ready(function(){
                $('#foundAllModal').modal('show');
            });
        }
        $('.dismiss').click(function(){
            setCookie("foundMessageSeen",true,365);
            $(this).parent().parent().modal('hide');
        });
    </script>
<?php else : ?>
    <script type="text/javascript">
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
        <tbody>
            <?php foreach ($treasure as $Treasure) : ?>
                <tr>
            <div id="ClueModal<?= $Treasure->id ?>" class="modal hide fade cluemodal">
                <div class="modal-header">
                    <h3>Clue For <?= $Treasure->title ?></h3>
                </div>
                <div class="modal-body">
                    <p><?= $Treasure->clue ?></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary" data-dismiss="modal">
                        Close
                    </a>
                </div>
            </div>
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
                    <a data-toggle="modal"
                        id="Click<?= $Treasure->id ?>"
                        data-id="<?= $Treasure->id ?>"
                        class="btn btn-info btn-mini">
                            Clue
                    </a>
                    <script type="text/javascript">
                        $('#Click<?= $Treasure->id ?>').click(function(){
                            $('.modal').modal('hide');
                            $('#ClueModal<?= $Treasure->id ?>').modal('show');
                            window.scrollTo(0, 1);
                        });
                    </script>
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
