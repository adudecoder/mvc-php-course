<header class="bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <a href="<?= URL ?>" class="navbar-brand">Blog Games</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="<?= URL ?>" class="nav-link" data-tooltip="tooltip" title="Fisrt Page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-tooltip="tooltip" title="About Us">About Us</a>
                    </li>
                </ul>

                <?php if (isset($_SESSION['user_id'])) : ?>
                    <span class="navbar-text">
                        <p>Hey, <?= $_SESSION['user_name'] ?>, Welcome</p>
                        <a class="btn btn-sm btn-danger" href="<?= URL ?>/users/logout">logout</a>
                    </span>
                <?php else : ?>
                    <span class="navbar-text">
                        <a href="<?= URL ?>/users/register" class="btn btn-info" data-tooltip="tooltip" title="Don't have an account? Register">Register</a>
                        <a href="<?= URL ?>/users/login" class="btn btn-info" data-tooltip="tooltip" title="Already have an account? Login">Login</a>
                    </span>
                <?php endif; ?>

            </div>
        </nav>
    </div>
</header>