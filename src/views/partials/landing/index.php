<?php
$this->layout('layouts/default', [
    'title' => 'Home'
])
?>

<div class="modal fade hide in out" id="helpModal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">x</a>
        <h3>Help</h3>
    </div>
    <div class="modal-body">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#findingtreasure" data-toggle="tab">Finding Treasure</a></li>
            <li><a href="#completingthehunt" data-toggle="tab">Completion</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="findingtreasure">
                <h4>Finding Treasure</h4>
                When you find a piece of &quot;Treasure&quot;, scan the QR Code with your Smart phone or
                device and you will be prompted to open a link where you will be rewarded with a Factoid.
                The app will then display the treasure you have found as well as
                clues to other pieces of treasure
            </div>
            <div class="tab-pane" id="completingthehunt">
                <h4>Completing The Treasure Hunt</h4>
                When you have find all <?= $amountOfTreasure ?> &quot;QR Code Treasures&quot; you will
                see a message telling you that you have completed the treasure hunt.
            </div>
        </div>
        <dl class="dl-horizontal">
            <dt>Further Help</dt>
            <dd>
                If you require further help using the application, please feel
                free to talk to a member of <?= APP_OWNER; ?> for further assistance
            </dd>
        </dl>
    </div>
</div>
<h3>Welcome to <?= APP_TITLE ?></h3>
<h3>Getting Started</h3>
<p>
    This application uses a smart phone or device to scan QR (Quick Response)
    codes to link to a web application. Register your account by clicking &quot;Register&quot;
    and entering your mobile number and a password... it's quick and easy!
</p>
<a class="btn btn-warning btn-large"  data-toggle="modal" href="#helpModal">
    <i class="icon-white icon-question-sign"></i> Help
</a>

<?php if (!isLoggedIn()) : ?>
    <a class="btn btn-success btn-large" href="<?= site_url('auth') ?>">
        Get Started <i class="fa fa-arrow-right"></i>
    </a>
<?php endif; ?>
