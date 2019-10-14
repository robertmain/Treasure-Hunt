<?php
$this->layout('layouts/default', [
    'title' => 'Treasure',
    'subtitle' => 'Add Treasure',
]);
?>

<?= form_open('admin/treasure/create', ['class' => 'form-horizontal']) ?>
<?= validation_errors() ?>
<div class="control-group">
    <label for="title" class="control-label">Treasure Title</label>
    <div class="controls">
        <?= form_input('title', null, 'maxlength="23"') ?>
    </div>
</div>
<div class="control-group">
    <label for="location" class="control-label">Location</label>
    <div class="controls">
        <?= form_input('location', null, 'maxlength="23"') ?>
    </div>
</div>
<div class="control-group">
    <label for="location" class="control-label">Text</label>
    <div class="controls">
        <?= form_textarea('text', null, 'class="text span4"') ?>
    </div>
</div>
<div class="control-group">
    <label for="location" class="control-label">Clue</label>
    <div class="controls">
        <?= form_textarea('clue', null, 'class="clue span4" maxlength="107"') ?>
    </div>
</div>
<div class="form-actions">
    <input type="submit" value="Add Treasure" class="btn btn-primary" />
</div>
<?= form_close() ?>
