<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $heading; ?></title>
    <?= link_tag('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') ?>
    <link rel="Stylesheet" href="/src/assets/css/style.css" />
</head>

<body>
    <div id="container">
        <div class="row">
            <div class="span2">
                <img src="<?= '/' . ASSET_PATH . 'img/tb_sign1.png'; ?>" alt="">
            </div>
            <div class="span10">
                <h1><?php echo $heading; ?></h1>
                <?php echo $message; ?>
                <p>
                    This page you requested could not be found. This could be
                    due to one of several reasons:
                </p>
                <ol>
                    <li>The page no longer exists</li>
                    <li>It was eaten by a tumblrbeast (see left)</li>
                    <li>The page was removed by a government conspiracy</li>
                </ol>
                <h3>What You Can Do</h3>
                <p>
                    Try using the back button in your browser or try again later.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
