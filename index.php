<?php
require_once('views/header.php');
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