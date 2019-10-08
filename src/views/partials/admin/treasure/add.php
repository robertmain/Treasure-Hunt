<?php $this->layout('layouts/default'); ?>
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
                <?= form_input('title', NULL, 'maxlength="23"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Location</label>
            <div class="controls">
                <?= form_input('location', NULL, 'maxlength="23"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Text</label>
            <div class="controls">
                <?= form_textarea('text', NULL, 'class="text span4"') ?>
            </div>
        </div>
        <div class="control-group">
            <label for="location" class="control-label">Clue</label>
            <div class="controls">
                <?= form_textarea('clue', NULL, 'class="clue span4" maxlength="107"') ?>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" value="Add Treasure" class="btn btn-primary" />
        </div>
        <?= form_close() ?>
    </div>
</div>
