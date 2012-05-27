<div id="stripTreasureModal" class="modal hide fade">
    <div class="modal-header">
        <h2><?= APPTITLE ?> <small>Strip Pirate Treasure</small></h2>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <h3 class="alert-heading">Warning</h3>
            <p>You are about to remove all treasure found by this pirate.</p>
            <p><strong>This cannot be un-done, cancelled or taken back after this point</strong></p>
            <p>Are you sure you want to continue?</p>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-success" data-dismiss="modal">No - Go Back</a>
        <a href="#" class="btn btn-danger striptreasure2"><i class="icon-white icon-warning-sign"></i> Yes - Strip This Pirate's Treasure</a>
    </div>
</div>
<h1>Pirates</h1>
<table class="table table-bordered table-striped"> 
    <thead> 
        <tr>
            <th>Pirate</th> <th>Treasure Found</th> <th colspan="2">Joined</th>
        </tr> 
    </thead> 
    <tbody> 
        <?php foreach ($mytreasures as $Mytreasure): ?>
            <tr id="pirate<?= $Mytreasure->p_id ?>"> 
                <td class="phone">
                    <?= $Mytreasure->phone ?>
                    <?php if (isBanned($Mytreasure->p_id)): ?>
                        <span class="label label-important">Banned</span>
                    <?php endif; ?>
                </td> 
                <td class="treasure"><?= $Mytreasure->treasures ?></td>
                <td><?= date(FRIENDLYDATEFORMAT, $Mytreasure->signup) ?></td> 
                <td>
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user"></i> Pirate <span class="caret"></span></a>
                        <ul class="dropdown-menu pull-right">
                            <?php if (isBanned($Mytreasure->p_id)): ?>
                                <li><a href="" data-id="<?= $Mytreasure->p_id ?>" class="unban"><i class="icon-ok"></i> Un-Ban</a></li>
                            <?php else: ?>
                                <li><a href="" data-id="<?= $Mytreasure->p_id ?>" class="ban"><i class="icon-ban-circle"></i> Ban</a></li>
                            <?php endif; ?>
                            <li><a href="#stripTreasureModal" class="striptreasure1" data-id="<?= $Mytreasure->p_id ?>"  data-toggle="modal"><i class="icon-gift"></i> Strip Treasure</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    $('tr').on('click', '.unban',function(event){
        var button = $(this);
        $.ajax({
            url: '<?= site_url('admin/pirates/unban') ?>/' + button.attr('data-id'),
            error: function(xhr, status, error) {
                console.log(error);
            },
            success: function(data) {
                button.removeClass('unban').addClass('ban').parent().parent().parent().parent().parent().find('.label-important').remove();
                button.html('<i class="icon-ban-circle"></i> Ban</a>');
            }
        });
        event.preventDefault();
    });
    $('tr').on('click', '.ban',function(){
        var button = $(this);
        $.ajax({
            url: '<?= site_url('admin/pirates/ban') ?>/' + button.attr('data-id'),
            error: function(xhr, status, error) {
                console.log(error);
            },
            success: function(data) {
                button.removeClass('ban').addClass('unban').parent().parent().parent().parent().parent().find('td.phone').append('<span class="label label-important">Banned</span>');
                button.html('<i class="icon-ok"></i> Un-Ban</a>');
            }
        });
        event.preventDefault();
    });
    
    $('tr').on('click', '.striptreasure1', function(event){
        var clicked = $(this);
        $.ajax({
            url: '<?= site_url('admin/pirates/get') ?>/' + clicked.attr('data-id'),
            error: function(xhr, status, error) {
                console.log(error);
            },
            success: function(response) {
                $('#stripTreasureModal').find('.striptreasure2').attr('data-id', response.id);
            }
        });
        event.preventDefault();
    });
    
    $('.striptreasure2').click(function(event){
        var clicked = $(this);
        $.ajax({
            url: '<?= site_url('admin/pirates/get') ?>/' + clicked.attr('data-id'),
            error: function(xhr, status, error) {
                console.log(error);
            },
            success: function(Pirate) {
                $.ajax({
                    url: '<?= site_url('admin/pirates/strip_treasure') ?>/' + clicked.attr('data-id'),
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                    success: function(Pirate) {
                        var pirateTableRow = $('table').find('#pirate'+clicked.attr('data-id'));
                        pirateTableRow.find('.treasure').text(0);
                        $('#stripTreasureModal').modal('hide');
                    }
                });
            }
        });
        event.preventDefault();
    });
</script>