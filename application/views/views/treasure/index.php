<h1>My Treasure</h1>
<?php if ((isBanned($this->session->userdata('id'))) && (isLoggedIn())): ?>
    <div class="alert">
        <h3 class="alert-heading">Information</h3>
        <p>
            Your account has been suspended. You may still use this application, 
            however you will be unable to find new pieces of treasure and (at the discretion of staff) 
            your existing pieces of treasure may be removed from you. 
            Please contact a member of <?= TEAMNAME ?> for more information.
        </p>
    </div>
<?php endif; ?>
<?php if (foundAll($this->session->userdata('id'))): ?>
    <div id="foundAllModal" class="modal hide fade" style="display: none; ">
        <div class="modal-header">
            <h3><?= $found->title ?></h3>
        </div>
        <div class="modal-body">
            <p><?= $found->message ?></p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary dismiss" data-dismiss="modal">Close</a>
        </div>
    </div>
    <script type="text/javascript">
        if(!getCookie("foundMessageSeen")){
            $(document).ready(function(){
                $('#foundAllModal').modal('show');
            });
        }
        $('.dismiss').click(function(){
            setCookie("foundMessageSeen",true,365);
            $(this).parent().parent().modal('hide');
        });
    </script>
<?php endif; ?>
<table class="table table-bordered table-striped table-condensed">
    <thead>
        <tr>
            <th>Title</th> <th>Status</th>
        </tr>
    </thead>
    <?php if (sizeof($treasure) > 0): ?>
        <tbody>
            <?php foreach ($treasure as $Treasure): ?>
                <tr>
            <div id="Modal<?= $Treasure->id ?>" class="modal hide fade" style="display: none; ">
                <div class="modal-header">
                    <h3>Clue For <?= $Treasure->title ?></h3>
                </div>
                <div class="modal-body">
                    <p><?= $Treasure->clue ?></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
                </div>
            </div>
            <td><?= $Treasure->title ?></td>
            <td>
                <?php if (isFound($Treasure->id, $me->id)): ?>
                    <span class="label label-success">Found</span> <?= $Treasure->location ?>
                <?php else: ?>
                    <span class="label">Not Found</span> <a data-toggle="modal" href="#Modal<?= $Treasure->id ?>" class="btn btn-info btn-mini">Clue</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
<?php else: ?>
    <tr>
        <td colspan="2"><p class="center"><em>There Is Currently No Treasure In The Database</em></p></td>
    </tr>
<?php endif; ?>
</table>