<?php
    require_once('utilities/DBConn.php');
    class CommentService {
        var $dbConn;
        public function __construct()
        {
            $this->dbConn = new DBConn();
            //$this->dbConn->connect();
        }
        
    }
?>