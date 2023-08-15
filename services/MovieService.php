<?php
    require_once('utilities/DBConn.php');
    class MovieService {
        var $dbConn;
        public function __construct()
        {
            $this->dbConn = new DBConn();
        }
        public function getTopMovie(){
            $query = "SELECT movie_id, title, imdb_rating, poster from Movie where released_year = 2022 and imdb_rating >= 7 order by imdb_rating desc limit 5;";
            $result = $this->dbConn->getQuery($query);
            // echo $result[0]['title'];
            $data = array();
            while($row = $result->fetch_assoc()){
               $data[] = $row;
            }
            return $data;
        }
    }
?>