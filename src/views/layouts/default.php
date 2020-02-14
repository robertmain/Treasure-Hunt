<?php $this->layout('layouts/live'); ?>
<?php if ($cookielaw == '1') : ?>
    <?php $this->push('scripts'); ?>
        <script>
            if(getCookie('messageSeen') !== 'true'){
                $(document).ready(() => $('#cookieModal')
                    .modal('show')
                    .find('.dismiss').click(({ target }) => {
                        setCookie('messageSeen', true, 365);
                        $(target).parents('.modal').modal('hide');
                    }));
            }
        </script>
    <?php $this->end(); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="cookieModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cookies Used By <?= APP_TITLE ?></h5>
            </div>
            <div class="modal-body">
                <p>
                    <?= APP_TITLE ?> uses cookies to keep your login session
                    active. By clicking "Dismiss" and continuing to use this
                    application, we assume that you are happy for us to
                    continue to use cookies in this manner
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success dismiss">I Agree. Dismiss</button>
                <a href="http://www.google.com" class="btn btn-danger">I Do Not Agree.</a>
            </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php $this->insert('partials::components/navbar'); ?>

<div class="container mt-4">
    <?php if ($title) : ?>
        <div class="row">
            <div class="col col-xs-12">
                <div class="pb-2 mb-2 border-bottom">
                    <h2><?= $title; ?> <small class="text-muted"><?= $subtitle ?></small></h2>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col col-xs-12">
            <?php if (isLoggedIn()) : ?>
                <p>My Nickname: <code><?= $me->nickname; ?></code></p>
            <?php endif; ?>
                <?= $this->section('content') ?>
        </div>
    </div>
    <footer>
        <hr>
        <p>
            &copy; <?= APP_OWNER . ' ' . date('Y'); ?><br />
            All Rights Reserved<br />
        </p>
    </footer>
</div>
