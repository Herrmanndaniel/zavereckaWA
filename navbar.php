<?php //session_start()?>
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-lg sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/hervago_lil_logo.png" alt="Hervago" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Domů</a>
                </li>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Přihlásit se</a>
                </li>
            <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Účet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./scripts/logout.php">Odhlasit</a>
                    </li>

                <?php endif; ?>
            </ul>

            <span class="navbar-text">
                Chcete zkusit trip? Hervago!
            </span>
        </div>
    </div>
</nav>
