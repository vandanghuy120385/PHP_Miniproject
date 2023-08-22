<?php
require_once('IDatabase.php');
class DBConn implements IDatabase
{
    var $conn;
    public function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '15112002'; // change your password here
        $database = 'imdb';

        $port = "3306";
        try{
           $this->conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password); 
           $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "connection failed: ". $e->getMessage();
        }
        // $this->conn = mysqli_connect($servername, $username, $password, $database, $port);

        // if (!$this->conn) {
        //     echo ('Connection failed: ' . mysqli_connect_error());
        // }
        // $query = "CREATE DATABASE IF NOT EXISTS imdb";
        // if (!mysqli_query($this->conn, $query)) {
        //     echo "Error: " . mysqli_error($this->conn);
        // } 
        // $db_selected = mysqli_select_db($this->conn,$database);
        // if (!$db_selected){
        //     die("failed using imdb");
        // }
    }

    
    public function getQuery($query)
    {
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;// return data array     
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function insertQuery($query) : bool {
        // $result = mysqli_query($this->conn, $query);
        // return $result;
        return false;
    }
    public function deleteQuery($query):bool{
        // $result = mysqli_query($this->conn, $query);
        // return $result;
        return false;

    }
    public function updateQuery($query):bool{
        // $result = mysqli_query($this->conn, $query);
        // return $result;
        return false;

    }
    public function searchByGenre($genre) {
        try{

            $query = "SELECT movie_id, title, imdb_rating, poster, released_year, genre from Movie where genre LIKE :genre LIMIT 15";
            $stmt = $this ->conn->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array('genre'=>$genre));
            $data = $stmt->fetchAll();
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
            return [];
        }


    }
    public function searchByName($title) : array {
        try{
            $query = "SELECT movie_id, title, imdb_rating, poster, released_year, genre from Movie where title LIKE :title";
            $stmt = $this ->conn->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array('title'=>"%".$title."%"));
            $data = $stmt->fetchAll();
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
            return [];
        }
    }
}
