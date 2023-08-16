<?php
    require_once '/var/www/test/services/MovieService.php';
    class SearchController{
        var $dbConn;
        public function __construct() {
            $this->dbConn = new MovieService();
        }
        public function searchByName($name){
            $foundResult = $this->dbConn->getMovieByName($name);
            require_once '/var/www/test/views/search/SearchResult.php';
        }
    }
    $name = $_GET["name"];
    $searchController = new SearchController();
    $searchController->searchByName($name);
?>
