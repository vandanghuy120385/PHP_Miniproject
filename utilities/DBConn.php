<?php
class DBConn
{
    var $conn;
    public function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = ''; // change your password here
        $database = 'imdb';
// <<<<<<< Updated upstream
//         $this->conn = mysqli_connect($servername, $username, $password);
// =======
        $port = "3307";
        $this->conn = mysqli_connect($servername, $username, $password, $database, $port);
// >>>>>>> Stashed changes
        if (!$this->conn) {
            echo ('Connection failed: ' . mysqli_connect_error());
        }
        $query = "CREATE DATABASE IF NOT EXISTS imdb";
        if (!mysqli_query($this->conn, $query)) {
            echo "Error: " . mysqli_error($this->conn);
        }
        $db_selected = mysqli_select_db($this->conn, $database);
        if (!$db_selected) {
            die("failed using imdb");
        }
    }
    public function connect()
    {

        $query = file_get_contents("SQLScripts/Movie.sql");
        if (mysqli_query($this->conn, $query)) {
            echo "Movie table created\n";
        } else {
            echo "error: " . $this->conn->error;
        }
        $query = file_get_contents("SQLScripts/User.sql");
        if (mysqli_query($this->conn, $query)) {
            echo "User table created\n";
        } else {
            echo "error: " . $this->conn->error;
        }
        $query = file_get_contents("SQLScripts/Comment.sql");
        if (mysqli_query($this->conn, $query)) {
            echo "Comment table created\n";
        } else {
            echo "error: " . $this->conn->error;
        }
        mysqli_close($this->conn);
        // echo $query;
    }
    public function getQuery($query)
    {
        $result =  mysqli_query($this->conn, $query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function inserQuery($query) : bool {
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
    public function deleteQuery($query):bool{
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
    public function updateQuery($query):bool{
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}
