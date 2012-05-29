<div class="row">
    <div class="span12">
        <h1>Treasure <small>Edit Treasure</small></h1>
    </div>
</div>
<div class="row">
    <div class="span12">
        <?= form_open('admin/treasure/update', array('class' => 'form-horizontal')) ?>
        <?= form_hidden('id', $Treasure->id) ?>
        <?= validation_errors() ?>
        <div class="control-group">
            <label for="title" class="control-label">Treasure Title</label>
            <div class="controls">
                <?= form_input('title', $Treasure->title, 'maxlength="23"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Location</label>
            <div class="controls">
                <?= form_input('location', $Treasure->location, 'maxlength="23"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Text</label>
            <div class="controls">
                <div class="input clue span4" name="text" contenteditable="true"><?= auto_typography($Treasure->text) ?></div>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Clue</label>
            <div class="controls">
                <div class="input clue span4" name="clue" contenteditable="true"><?= auto_typography($Treasure->clue) ?></div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class="icon-white icon-refresh"></i> Save Changes</button>
        </div>
        <?= form_close() ?>
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