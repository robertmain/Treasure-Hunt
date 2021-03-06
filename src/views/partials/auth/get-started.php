<?php
    $this->layout('layouts/split', [
        'title' => 'Get Started',
    ]);

    $this->start('left'); ?>
    <h3>Existing Users</h3>
    <p>
        Already got an account? Sign-in below to continue where you left off!
    </p>
    <?php $this->insert('partials::auth/login'); ?>
<?php $this->end(); ?>

<?php $this->start('right'); ?>
    <h3>New Users</h3>
    <p>
        Not signed up yet? Don't worry - registration is quick and easy.
    </p>
    <?php $this->insert('partials::auth/register'); ?>
<?php $this->end(); ?>
