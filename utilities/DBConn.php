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
        $stmt = $this->conn->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;// return data array
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
}
