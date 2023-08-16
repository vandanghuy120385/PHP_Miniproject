<?php

// function db(): PDO
// {
//     static $pdo;

//     if (!$pdo) {
//         $pdo = new PDO(
//             sprintf("mysql:host=%s;dbname=%s;charset=UTF8", DB_HOST, DB_NAME),
//             DB_USER,
//             DB_PASSWORD,
//             [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
//         );
//     }
    
//     return $pdo;
// }

function db(): mysqli{
    static $mysqli;
    if(!$mysqli){
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT);

        // Check connection
        if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }
    }
    return $mysqli;
}