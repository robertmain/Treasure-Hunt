<div class="row">
    <div class="span12">
        <h1>Treasure <small>Add Treasure</small></h1>
    </div>
</div>
<div class="row">
    <div class="span12">
        <?= form_open('admin/treasure/create', array('class' => 'form-horizontal')) ?>
        <?= validation_errors() ?>
        <div class="control-group">
            <label for="title" class="control-label">Treasure Title</label>
            <div class="controls">
                <?= form_input('title') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Location</label>
            <div class="controls">
                <?= form_input('location') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Text</label>
            <div class="controls">
                <div class="input clue span4" name="text" contenteditable="true"></div>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Clue</label>
            <div class="controls">
                <div class="input clue span4" name="clue" contenteditable="true"></div>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" value="Add Treasure" class="btn btn-primary" />
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