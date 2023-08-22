<?php
    require_once('models/Movie.php');
    interface IDatabase{
        public function getQuery($query);
        public function deleteQuery($query):bool;        
        public function updateQuery($query):bool;
        public function insertQuery(Movie $query):bool;
    }
?>