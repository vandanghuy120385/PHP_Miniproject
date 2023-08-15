<?php
    require_once('utilities/DBConn.php');
    class MovieService {
        var $dbConn;
        public function __construct()
        {
            $dbConn = new DBConn();
        }
        public function getNewMovie(){
            
        }
    }
?>