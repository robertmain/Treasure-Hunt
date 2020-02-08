<?php
$this->layout('layouts/default', [
    'title' => 'Treasure',
    'subtitle' => 'Edit Treasure',
]);
?>
<?= form_open('admin/treasure/update', ['class' => 'form-horizontal']) ?>
<?= form_hidden('id', $Treasure->id) ?>
<?= validation_errors() ?>
<div class="form-group">
    <label for="title" class="control-label">Treasure Title</label>
    <div class="controls">
        <?= form_input('title', $Treasure->title, 'maxlength="23" class="form-control"') ?>
    </div>
</div>
<div class="form-group">
    <label for="location" class="control-label">Location</label>
    <div class="controls">
        <?= form_input('location', $Treasure->location, 'maxlength="23" class="form-control"') ?>
    </div>
</div>
<div class="form-group">
    <label for="location" class="control-label">Text</label>
    <div class="controls">
        <?=form_textarea('text', $Treasure->text, 'class="text span4 form-control"')?>
    </div>
</div>
<div class="form-group">
    <label for="location" class="control-label">Clue</label>
    <div class="controls">
        <?=form_textarea('clue', $Treasure->clue, 'class="text span4 form-control" maxlength="107"')?>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Save Changes
    </button>
</div>
<?= form_close() ?>
