<?php
require_once "controllers/SearchController.php";
$seachController = new SearchController();
$name = $_GET["name"];
echo $name;
$seachController->searchByName($name);
?>