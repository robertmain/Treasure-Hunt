<?php
$this->layout('layouts/default', [
    'title' => 'Welcome To ' . APP_TITLE
])
?>

<p>
    This application uses a smart phone or device to scan QR (Quick Response)
    codes to link to a web application. Click &quot;Get Started&quot; below to
    create an account. It's quick and easy!
</p>


<p>
    When you find a piece of &quot;Treasure&quot;, scan the QR Code with your Smart phone or
    device and you will be prompted to open a link where you will be rewarded with a Factoid.
    The app will then display the treasure you have found as well as
    clues to other pieces of treasure
</p>

<p>
    When you have found all the QR Codes you will see a message telling you that you have completed the treasure hunt.
</p>

<p>
    If you require further help using the application, please feel
    free to talk to a member of <?= APP_OWNER; ?> for further assistance
</p>

<?php if (!isLoggedIn()) : ?>
    <a class="btn btn-success btn-large" href="<?= site_url('auth') ?>">
        Get Started <i class="fa fa-arrow-right"></i>
    </a>
<?php endif; ?>
