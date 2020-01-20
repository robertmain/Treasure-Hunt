<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?= site_url() ?>"><?= APP_TITLE ?></a>
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
                            <?php endif; ?>
                            <li><?= anchor('treasure', 'My Treasure') ?></li>
                            <li><?= anchor('auth/logout', 'Sign Out') ?></li>
                        <?php else : ?>
                            <li><?= anchor(site_url(), 'Home') ?></li>
                            <li><?= anchor(site_url('auth'), 'Log In/Register') ?></li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
