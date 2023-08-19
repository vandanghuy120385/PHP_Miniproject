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
            $query = "SELECT movie_id, title, imdb_rating, poster from Movie where released_year = 2022 and imdb_rating >= 7 order by imdb_rating desc limit 5;";
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
            $query = "SELECT movie_id, title, imdb_rating, poster, released_year, genre from Movie where movie_id = '".$movie_id."';";
            $data = $this->dbConn->getQuery($query);
            return $data;
        }
        // update movie's detail information
        public function edit($data ){
            $query =  "UPDATE Movie SET title = '".$data['title']."', film_url = '".$data['film_url']."', movie_type ='".$data['movie_type']."', imdb_rating = '".$data['imdb_rating']."',poster = '".$data['poster']."', released_year = '".$data['released_year']."', genre = '".$data['genre']."', runtime = '".$data['runtime']."' WHERE movie_id = '".$data['movie_id']."';";
            $result = $this->dbConn->updateQuery($query);
            return $result;    
        }
        // delete movie 
        public function delete($movie_id){
            $query = "DELETE FROM Movie WHERE movie_id = '".$movie_id."'";
            $result = $this->dbConn->deleteQuery($query);
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
            $result = $this->dbConn->inserQuery($query);
            return $result;
        }
    }
?>