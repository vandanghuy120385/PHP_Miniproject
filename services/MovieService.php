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
            $query = "SELECT movie_id, title, imdb_rating, poster from Movie where imdb_rating >= 7 order by imdb_rating desc limit 5;";
            $result = $this->dbConn->getQuery($query);
            //echo $result[0]['title'];
            $data = array();
            while($row = $result->fetch_assoc()){
               $data[] = $row;
            }
            return $data;
        }
        // get movie's detail information
        public function getInfo($movie_id){
            $query = "SELECT movie_id, title, film_url, movie_type, imdb_rating, poster, released_year, genre, runtime from Movie where movie_id = '".$movie_id."';";
            $data = $this->dbConn->getQuery($query)->fetch_assoc();
            //echo $data['title'];
            return $data;
        }
        // update movie's detail information
        public function edit($data ){
            $query =  "UPDATE Movie SET title = '".$data['title']."', film_url = '".$data['film_url']."', movie_type ='".$data['movie_type']."', imdb_rating = '".$data['imdb_rating']."',poster = '".$data['poster']."', released_year = '".$data['released_year']."', genre = '".$data['genre']."', runtime = '".$data['runtime']."' WHERE movie_id = '".$data['movie_id']."';";
            $result = $this->dbConn->getQuery($query);
            return $result;    
        }
        // delete movie 
        public function delete($movie_id){
            $query = "DELETE FROM Movie WHERE movie_id = '".$movie_id."'";
            $result = $this->dbConn->getQuery($query);
            return $result; 
        }
    }
?>