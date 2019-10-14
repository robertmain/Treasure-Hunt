<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?= link_tag(base_url(ASSET_PATH . 'css/style.css')) ?>
        <script type="text/javascript" src="<?= base_url(ASSET_PATH . 'js/jquery.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url(ASSET_PATH . 'js/bootstrap.min.js') ?>"></script>
        <title><?= APPTITLE ?></title>
        <?php if ($CI->agent->is_mobile()) : ?>
            <meta name="viewport" content="user-scalable=no, width=device-width" />
            <meta name="apple-mobile-web-app-capable" content="yes" />
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
            <script type="text/javascript">
                window.addEventListener("load",function() {
                    setTimeout(function(){
                        window.scrollTo(0, 1);
                    }, 0);
                });
            </script>
        <?php endif; ?>
    </head>
    <body>
        <?php if ($cookielaw == '1') : ?>
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
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?= site_url() ?>"><?= APPTITLE ?></a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <?php if ($CI->uri->uri_string() != 'admin/login') : ?>
                                <?php if (isLoggedIn()) : ?>
                                    <?php if (isAdmin()) : ?>
                                        <li><?= anchor('admin/home', 'Dashboard') ?></li>
                                        <li><?= anchor('admin/treasure', 'Treasure') ?></li>
                                        <li><?= anchor('admin/admins', 'Admins') ?></li>
                                        <li><?= anchor('admin/pirates', 'Pirates') ?></li>
                                        <li><?= anchor('admin/settings', 'Application Settings') ?></li>
                                        <li><?= anchor('admin/logout', 'Sign Out') ?></li>
                                    <?php else : ?>
                                        <li><?= anchor('treasure', 'My Treasure') ?></li>
                                        <li><?= anchor('auth/logout', 'Sign Out') ?></li>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <li><?= anchor(site_url(), 'Home') ?></li>
                                    <li><?= anchor(site_url('auth/login'), 'Sign In') ?></li>
                                    <li><?= anchor(site_url('auth/register'), 'Register') ?></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
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
                        <?= img(base_url(ASSET_PATH . 'img/hostedby.png')) ?>
                    </p>
                </footer>
            <?php endif; ?>
        </div>
    </body>
    <?php if ($cookielaw == '1') : ?>
        <script src="<?= base_url(ASSET_PATH . 'js/cookie.js') ?>"></script>
        <script type="text/javascript">
            if(!getCookie("messageSeen")){
                $(document).ready(() => {
                    $('#myModal').modal('show');
                });
            }
            $('.dismiss').click(function(){
                setCookie("messageSeen",true,365);
                $(this).parent().parent().modal('hide');
            });
        </script>
    <?php endif; ?>
</html>
