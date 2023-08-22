<?php
    require_once('utilities/DBConn.php');
    class MovieService {
        var $dbConn;
        public function __construct()
        {
            $this->dbConn = new DBConn();
            //$this->dbConn->connect();
        }
        public function getTopMovie(){
            $query = "SELECT movie_id, title, imdb_rating, poster from Movie where released_year >= 2000 and imdb_rating >= 7 order by imdb_rating desc limit 5;";
            $data = $this->dbConn->getQuery($query);
            return $data;
        }

        public function getMovieByName($name){
            $query = "SELECT * FROM Movie WHERE title LIKE '%".$name."%';";
            $data = $this->dbConn->getQuery($query);
            return $data;
        }
        // get movie's detail information
        public function getInfo($movie_id){
            $data = $this->dbConn->SearchByID($movie_id);
            return $data;
        }
        // update movie's detail information
        public function edit($data ){
            $result = $this->dbConn->updateQuery($data);
            return $result;    
        }
        // delete movie 
        public function delete($movie_id){
            $result = $this->dbConn->deleteQuery($movie_id);
            return $result; 
        }

        public function getMovieByGenre($genre){
            $query = "SELECT movie_id, title, imdb_rating, poster, released_year, genre from Movie where genre LIKE '%" . $genre . "%' LIMIT 15";
            $data = $this->dbConn->getQuery($query);
            // echo $data['title'];
            return $data; 
        }
        public function insertMovie(Movie $movie) : bool{
            $query = "INSERT INTO Movie VALUES (" . $movie->__toString() . ");";
            echo $query;
            $result = $this->dbConn->insertQuery($query);
            return $result;
        }
    }
?>