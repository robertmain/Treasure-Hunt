<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?= link_tag(base_url(ASSET_PATH . 'css/style.css')) ?>
        <script type="text/javascript" src="<?= base_url(ASSET_PATH . 'js/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url(ASSET_PATH . 'js/bootstrap.min.js') ?>"></script>
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
                    <?= $this->section('content') ?>
                </div>
            </div>
        </div>
    </body>
</html>
