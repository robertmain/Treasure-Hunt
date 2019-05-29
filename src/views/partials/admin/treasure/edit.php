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
                <?=form_textarea('text',$Treasure->text, 'class="text span4"')?>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Clue</label>
            <div class="controls">
                <?=form_textarea('clue',$Treasure->clue, 'class="text span4" maxlength="107"')?>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class="icon-white icon-refresh"></i> Save Changes</button>
        </div>
        <?= form_close() ?>
    </div>
</div>