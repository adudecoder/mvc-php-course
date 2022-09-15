<?php
include_once './../app/conf.php';
include_once './../app/Lib/Routes.php';
include_once './../app/Lib/Controller.php';
include_once './../app/Lib/Database.php';
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= APP ?> </title>

    <!-- BOOTSRAP CDN -->
    <!-- CSS ONLY -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= URL ?>/public/css/style.css" rel="stylesheet">

</head>

<body>

    <?php
    include '../app/Views/header.php';
    $routes = new Routes();
    include '../app/Views/footer.php';
    ?>

    <!-- BOOTSRAP CDN -->
    <!-- SCRIPT ONLY -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    <script src="<?= URL ?>/public/js/script.js"></script>
</body>

</html>