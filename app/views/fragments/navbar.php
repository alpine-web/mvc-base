        <nav class="navbar navbar-expand-md navbar-light bg-light mb-3">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#siteNavigation" aria-controls="siteNavigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="siteNavigation">
                    <ul class="navbar-nav mr-auto">
                        <a class="nav-link <?= isNavPageActive("/"); ?>" href="<?php echo URLROOT; ?>">
                            Home
                        </a>
                        <a class="nav-link <?= isNavPageActive("/shop"); ?>" href="<?php echo URLROOT . "/shop"; ?>">
                            Artikelen
                        </a>
                        <a class="nav-link <?= isNavPageActive("/cars"); ?>" href="<?php echo URLROOT . "/cars"; ?>">
                            Auto's
                        </a>
                        <a class="nav-link <?= isNavPageActive("/cars"); ?>" href="<?php echo URLROOT . "/pdf"; ?>">
                            PDF
                        </a>
                    </ul>
                    
                    <ul class="navbar-nav ml-auto">
                        <?php if(isset($_SESSION["userid"])) : ?>
                            
                        <?php if($_SESSION["useradmin"] == 1) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="personalDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administratie
                            </a>
                            <div class="dropdown-menu" aria-labelledby="personalDropdown">
                                <a class="dropdown-item <?= isNavPageActive("/admin"); ?>" href="<?= URLROOT. "/admin"; ?>">
                                    Dashboard
                                </a>
                                <a class="dropdown-item <?= isNavPageActive("/admin/users"); ?>" href="<?= URLROOT. "/admin/users"; ?>">
                                    Gebruikers beheren
                                </a>
                                <a class="dropdown-item <?= isNavPageActive("/admin/products"); ?>" href="<?= URLROOT. "/admin/products"; ?>">
                                    Producten beheren
                                </a>
                            </div>
                        </li>
                        <?php endif; ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="personalDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION["username"]; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="personalDropdown">
                                <a class="dropdown-item" href="<?= URLROOT. "/authentication/logout"; ?>">
                                    Uitloggen
                                </a>
                            </div>
                        </li>
                        <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link <?= isNavPageActive("/authentication/register"); ?>" href="<?= URLROOT. "/authentication/register"; ?>">
                                Aanmelden
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= isNavPageActive("/authentication/login"); ?>" href="<?= URLROOT. "/authentication/login"; ?>">
                                Inloggen
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>