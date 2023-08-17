<?php
require_once('views/header.php');
require_once __DIR__ . '/controllers/AuthController.php'
?>
<main>

    <?php
    require_once('controllers/HomePageController.php');
    $homePageController = new HomePageController();
    $homePageController->getTopMovie();
    ?>
</main>
<?php
require_once('views/footer.php');
?>