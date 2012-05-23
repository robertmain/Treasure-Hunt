<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?= link_tag(base_url() . VIEWPATH . 'css/live.css') ?>
        <script type="text/javascript" src="<?= base_url() . VIEWPATH . 'js/jquery.min.js' ?>"></script>
        <script type="text/javascript" src="<?= base_url() . VIEWPATH . 'js/bootstrap.min.js' ?>"></script>
        <meta name="viewport" content="user-scalable=no, width=device-width" />
        <title><?= APPTITLE ?></title>
        <script type="text/javascript">
            window.addEventListener("load",function() {
                setTimeout(function(){
                    window.scrollTo(0, 1);
                }, 0);
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <?php //if (($this->agent->is_mobile()) | ($this->uri->segment(1) == 'admin')): ?>
                    <?php if (isLoggedIn() && !isAdmin()): ?>
                        <p>My ID:<?= md5('USER' . $me->phone) ?></p>
                    <?php endif; ?>
                    <?= $content ?>
                </div>
            </div>
        </div>
    </body>
</html>