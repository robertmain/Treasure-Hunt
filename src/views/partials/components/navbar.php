<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-end">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url() ?>"><?= APP_TITLE ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                    <?php if (isLoggedIn()) : ?>
                        <li class="nav-item"><?= anchor('treasure', 'My Treasure', 'class="nav-link"') ?></li>
                        <?php if (isAdmin()) : ?>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#" id="navbarDropdown"
                                    role="button"
                                    data-toggle="dropdown"
                                >
                                    Adminstration
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?= anchor('admin/home', 'Dashboard', 'class="dropdown-item"') ?>
                                    <?= anchor('admin/treasure', 'Treasure', 'class="dropdown-item"') ?>
                                    <?= anchor('admin/admins', 'Admins', 'class="dropdown-item"') ?>
                                    <?= anchor('admin/pirates', 'Pirates', 'class="dropdown-item"') ?>
                                    <?= anchor('admin/settings', 'Settings', 'class="dropdown-item"') ?>
                                </div>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item"><?= anchor('auth/logout', 'Sign Out', 'class="nav-link"') ?></li>
                    <?php else : ?>
                        <li class="nav-item"><?= anchor(site_url('auth'), 'Log In/Register', 'class="nav-link"') ?></li>
                    <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
