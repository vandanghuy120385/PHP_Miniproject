<!-- <main>

    <?php
    // require_once('controllers/HomePageController.php');
    // $homePageController = new HomePageController();
    // $homePageController->getTopMovie();
    // $homePageController->getInfo("tt12327578");
    ?>
</main> -->

<?php 
$mod = isset($_GET['mod'])?$_GET['mod']:'movie';
$act = isset($_GET['act'])?$_GET['act']:'list';

switch ($mod) {

	case 'movie':
	require_once('controllers/HomePageController.php');
	$homepage_controller = new HomePageController();

	switch ($act) {
		case 'list':
		$homepage_controller->getTopMovie();
		break;
		// case 'add':
		// $homepage_controller->add();
		// break;
		// case 'store':
		// $homepage_controller->store();
		// break;
		case 'detail':
		$homepage_controller->getInfo();
		break;
		case 'edit':
		$homepage_controller->edit();
		break;
		case 'update':
		$homepage_controller->update();
		break;
		case 'delete':
		$homepage_controller->delete();
		break;
		default:
		echo "<br>không có gì hết.";
		break;
	}
	break;

}
?>
