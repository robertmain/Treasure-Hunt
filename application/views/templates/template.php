<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?= link_tag(base_url() . VIEWPATH . 'css/style.css') ?>
        <script type="text/javascript" src="<?= base_url() . VIEWPATH . 'js/jquery.min.js' ?>"></script>
        <script type="text/javascript" src="<?= base_url() . VIEWPATH . 'js/bootstrap.min.js' ?>"></script>
        <meta name="viewport" content="user-scalable=no, width=device-width" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <title><?= APPTITLE ?></title>
        <script type="text/javascript">
            window.addEventListener("load",function() {
                setTimeout(function(){
                    window.scrollTo(0, 1);
                }, 0);
            });
<?= file_get_contents(base_url() . APPPATH . 'views/js/cookie.js'); ?>
        </script>
    </head>
    <body>
        <div class="modal fade hide in out" id="myModal">
            <div class="modal-header">
                <h3>Cookies On <?= APPTITLE ?></h3>
            </div>
            <div class="modal-body">
                <p><?= APPTITLE ?> uses cookies to keep your login session active.
                    By clicking "Dismiss" and continuing to use this application, we assume that you are happy for us to continue to use cookies in this manner</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-success dismiss">Dismiss</a>
                <a href="http://www.google.com" class="btn btn-danger">Leave Application</a>
            </div>
        </div>

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
                            <?php if ($this->uri->uri_string() != 'admin/login'): ?>
                                <?php if (isLoggedIn()): ?>
                                    <?php if (isAdmin()): ?>
                                        <li><?= anchor('admin/home', 'Dashboard') ?></li>
                                        <li><?= anchor('admin/treasure', 'Treasure') ?></li>
                                        <li><?= anchor('admin/admins', 'Admins') ?></li>
                                        <li><?= anchor('admin/pirates', 'Pirates') ?></li>
                                        <li><?= anchor('admin/logout', 'Sign Out') ?></li>
                                    <?php else: ?>
                                        <li><?= anchor('treasure', 'My Treasure') ?></li>
                                        <li><?= anchor('logout', 'Sign Out') ?></li>
                                    <?php endif; ?>
                                <?php else: ?>
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
                    <?php if (isLoggedIn() && !isAdmin()): ?>
                        <p>My ID:<?= md5(PIRATESALT . $me->phone) ?></p>
                    <?php endif; ?>
                    <?= $content ?>
                </div>
            </div>
            <?php if ($this->uri->uri_string() != 'admin/login'): ?>
                <hr>
                <footer>
                    <p>
                        Proudly Powered By <?= anchor('http://pagodabox.com', 'Pagoda Box') ?><br />
                        Copyright <?= date('Y') ?> &copy; <?= APPTITLE ?><br />
                        A <?= TEAMNAME ?> Web Application<br />
                        All Rights Reserved
                    </p>
                </footer>
            <?php endif; ?>
        </div>
    </body>
    <script type="text/javascript">
        if(!getCookie("messageSeen")){
            $(document).ready(function(){
                $('#myModal').modal('show')
            });
        }
        $('.dismiss').click(function(){
            setCookie("messageSeen",true,365);
            $(this).parent().parent().modal('hide');
        });
    </script>
</html>
