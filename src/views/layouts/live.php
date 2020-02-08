<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/vendor.js')) ?>"></script>
        <script src="<?= base_url(ASSET_PATH . $this->asset('dist/js/main.js')) ?>"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= APP_TITLE ?></title>
    </head>
    <body>
        <?= $this->section('content') ?>
    </body>
    <?= $this->section('scripts'); ?>
</html>
