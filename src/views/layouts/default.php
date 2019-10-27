<?php $this->layout('layouts/live'); ?>
<?php if ($cookielaw == '1') : ?>
    <?php $this->push('scripts'); ?>
        <script src="<?= ASSET_PATH . $this->asset('js/cookie.js') ?>"></script>
        <script type="text/javascript">
            const modalWindow = $('#myModal');
            if(!getCookie("messageSeen")){
                $(document).ready(() => modalWindow.modal('show'));
            }
            $('.dismiss').click(() => {
                setCookie("messageSeen", true, 365);
                modalWindow.modal('hide');
            });
        </script>
    <?php $this->end(); ?>
    <div class="modal fade hide in out" id="myModal">
        <div class="modal-header">
            <h3>Cookies On <?= APPTITLE ?></h3>
        </div>
        <div class="modal-body">
            <p>
                <?= APPTITLE ?> uses cookies to keep your login session
                active. By clicking "Dismiss" and continuing to use this
                application, we assume that you are happy for us to
                continue to use cookies in this manner
            </p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-success dismiss">I Agree. Dismiss</a>
            <a href="http://www.google.com" class="btn btn-danger">I Do Not Agree.</a>
        </div>
    </div>
<?php endif; ?>

<?php $this->insert('partials::components/navbar'); ?>

<div class="container">
    <?php if ($title) : ?>
        <div class="row">
            <div class="span12">
                <h1><?= $title; ?> <small><?= $subtitle ?></small></h1>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="span12">
            <?php if (isLoggedIn() && !isAdmin()) : ?>
                <p>My ID:<?= md5(PIRATESALT . $me->phone) ?></p>
            <?php endif; ?>
                <?= $this->section('content') ?>
        </div>
    </div>
    <?php if ($CI->uri->uri_string() != 'admin/login') : ?>
        <hr>
        <footer>
            <p>
                A <?= TEAMNAME ?> Web Application<br />
                All Rights Reserved<br />
                <?= img(ASSET_PATH . $this->asset('img/hostedby.png')) ?>
            </p>
        </footer>
    <?php endif; ?>
</div>
