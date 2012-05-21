<div class="row">
    <div class="span12">
        <h1>Treasure <small>View Treasure</small></h1>
    </div>
</div>
<div class="row">
    <div class="span12">
        <h2><?= $Treasure->title ?></h2>
        <h4>Location: <?= $Treasure->location ?></h4>
        <hr>
        <?= auto_typography($Treasure->text) ?>
    </div>
</div>

<script type="text/javascript">
    var form = $('form');
    $('form').submit(function(event){
        $('div.input').each(function (){ 
            $(form).append('<input type="hidden" name="' + $(this).attr('name') + '" value="' + $(this).html() + '">');
        });
    });
</script>