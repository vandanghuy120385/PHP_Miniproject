<?php
require_once('IDatabase.php');
class DBConn implements IDatabase
{
    var $conn;
    public function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = ''; // change your password here
        $database = 'imdb';

        //$port = "3307";
        try{
           $this->conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password); 
           $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "connection failed: ". $e->getMessage();
        }
    }

    public function getQuery($query)
    {   
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = [];
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
        
            return $data;
        }catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
 
    public function insertQuery($query) : bool {
         // $result = mysqli_query($this->conn, $query);
         // return $result;
         return false;
    }
    public function deleteQuery($movie_id):bool{
        try {
            $stmt = $this->conn->prepare("DELETE FROM Movie WHERE movie_id = :movie_id");
            $stmt->bindParam(':movie_id',$movie_id);
            $stmt->execute();
            
            $rowCount = $stmt->rowCount(); // Number of affected rows
            if ($rowCount > 0) {
                return true; // Query executed successfully
            } else {
                return false; // No rows affected, query may not have matched any records
            }
        } catch (PDOException $e) {
            // Handle the exception or log the error
            echo "Error: " . $e->getMessage();
            return false;
        }
 
    }

    public function SearchByID($movie_id){
        try {
            $stmt = $this->conn->prepare("SELECT movie_id, title, imdb_rating, poster, released_year, genre, movie_type, runtime, film_url from Movie where movie_id = :movie_id");
            $stmt->bindParam(':movie_id',$movie_id);
            $stmt->execute();
            
            $data = $stmt->fetch();
            return $data;
        } catch (PDOException $e) {
            // Handle the exception or log the error
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function SearchByGenre($genre){

    }
    
    public function SearchByName($title){
        
    }
    
    public function updateQuery($data):bool{
        try {
            $stmt = $this->conn->prepare("UPDATE Movie SET title = :title , film_url = :film_url, movie_type = :movie_type, imdb_rating = :imdb_rating, poster = :poster, released_year = :released_year, genre = :genre, runtime =:runtime WHERE movie_id = :movie_id");
            
            $stmt->bindParam(':movie_id',$data['movie_id']);
            $stmt->bindParam(':title',$data['title']);
            $stmt->bindParam(':film_url',$data['film_url']);
            $stmt->bindParam(':movie_type',$data['movie_type']);
            $stmt->bindParam(':imdb_rating',$data['imdb_rating']);
            $stmt->bindParam(':poster',$data['poster']);
            $stmt->bindParam(':released_year',$data['released_year']);
            $stmt->bindParam(':genre',$data['genre']);
            $stmt->bindParam(':runtime',$data['runtime']);

            $stmt->execute();
            
            $rowCount = $stmt->rowCount(); // Number of affected rows
            if ($rowCount > 0) {
                return true; // Query executed successfully
            } else {
                return false; // No rows affected, query may not have matched any records
            }
        } catch (PDOException $e) {
            // Handle the exception or log the error
            echo "Error: " . $e->getMessage();
            return false;
        }
 
    }
}
