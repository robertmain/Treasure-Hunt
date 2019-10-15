<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?= link_tag(base_url(ASSET_PATH . 'css/style.css')) ?>
        <script type="text/javascript" src="<?= base_url(ASSET_PATH . 'js/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url(ASSET_PATH . 'js/bootstrap.min.js') ?>"></script>
        <meta name="viewport" content="user-scalable=no, width=device-width" />
        <title><?= APPTITLE ?></title>
        <?php if ($CI->agent->is_mobile()) : ?>
            <meta name="viewport" content="user-scalable=no, width=device-width" />
            <meta name="apple-mobile-web-app-capable" content="yes" />
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
            <script type="text/javascript">
                window.addEventListener('load', () => {
                    setTimeout(() => window.scrollTo(0, 1), 0);
                });
            </script>
        <?php endif; ?>
    </head>
    <body>
        <?= $this->section('content') ?>
    </body>
    <?= $this->section('scripts'); ?>
</html>
