<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?= link_tag(ASSET_PATH . $this->asset('css/style.css')) ?>
        <script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/vendor.js')) ?>"></script>
        <script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/main.js')) ?>"></script>
        <meta name="viewport" content="user-scalable=no, width=device-width" />
        <title><?= APP_TITLE ?></title>
    </head>
    <body>
        <?= $this->section('content') ?>
    </body>
    <?= $this->section('scripts'); ?>
</html>
