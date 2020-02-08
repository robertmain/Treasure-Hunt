<?php
$this->layout('layouts/default', [
    'title' => 'Treasure',
    'subtitle' => 'Add Treasure',
]);
?>

<?= form_open('admin/treasure/create', ['class' => 'form-horizontal']) ?>
<?= validation_errors() ?>
<div class="form-group">
    <label for="title" class="control-label">Treasure Title</label>
    <div class="controls">
        <?= form_input('title', null, 'maxlength="23" class="form-control"') ?>
    </div>
</div>
<div class="form-group">
    <label for="location" class="control-label">Location</label>
    <div class="controls">
        <?= form_input('location', null, 'maxlength="23" class="form-control"') ?>
    </div>
</div>
<div class="form-group">
    <label for="location" class="control-label">Text</label>
    <div class="controls">
        <?= form_textarea('text', null, 'class="text span4 form-control"') ?>
    </div>
</div>
<div class="form-group">
    <label for="location" class="control-label">Clue</label>
    <div class="controls">
        <?= form_textarea('clue', null, 'class="clue span4  form-control" maxlength="107"') ?>
    </div>
</div>
<div class="form-group">
    <input type="submit" value="Add Treasure" class="btn btn-primary" />
</div>
<?= form_close() ?>
