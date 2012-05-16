<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?= link_tag(base_url() . VIEWPATH . 'css/style.css') ?>
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
                            <?php if (isLoggedIn()): ?>
                                <li><?= anchor('treasure', 'My Treasure') ?></li>
                                <li><?= anchor('logout', 'Sign Out (' . $me->name . ')') ?></li>
                            <?php else: ?>
                                <li><?= anchor(site_url(), 'Home') ?></li>
                                <li><?= anchor(site_url('auth'), 'Sign In/Register') ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <?php //if ($this->agent->is_mobile()): ?>
                    <?php if (isLoggedIn()): ?>
                        <p>My ID:<?= md5($me->name) ?></p>
                    <?php endif; ?>
                    <?= $content ?>
                    <?php //else: ?>
                    <!--                        <div class="alert  alert-error">
                                                <ul class="thumbnails">    
                                                    <li class="span1"><img class="pull-left" src="<?= base_url() . VIEWPATH ?>img/error.png" /></li>
                                                    <li class="span10">
                                                        <h1 class="alert-heading">Error</h1>
                                                        <p>This Application Is Only Available To Mobile Devices</p>
                                                    </li>
                                                </ul>
                                            </div>-->
                    <?php //endif; ?>
                </div>
            </div>
            <hr>
            <footer>
                <p>
                    Copyright <?= date('Y') ?> &copy; <?= APPTITLE ?><br />
                    A <?= TEAMNAME ?> Web Application<br />
                    All Rights Reserved
                </p>
            </footer>
        </div>
    </body>
</html>