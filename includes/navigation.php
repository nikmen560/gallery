<?php require_once("head.php") ?>
<?php require_once("login.php") ?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/gallery/index.php">
            <i class="fas fa-film mr-2"></i>
            Gallerika 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1" aria-current="page" href="/gallery/index.php">Wallpapers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3" href="contact.php">Contact</a>
                </li>
                <?php if (isset($session->id)) : ?>
                    <li class="nav-item">
                        <a class="nav-link nav-link-4" id="adminNavButton" href="/gallery/admin/index.php">Admin</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item" id="loginLinkPlaceholder">
                        <a class="nav-link nav-link-5" id="loginNavButton" href="/gallery/login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>