<?php
    require_once('services/MovieService.php');
    class SearchController{
        var $dbConn;
        public function __construct() {
            $this->dbConn = new MovieService();
        }
        public function searchByName($name){
            echo $name;
            $foundResult = $this->dbConn->getMovieByName($name);
            require_once('views/search/SearchResult.php');
        }
    }
