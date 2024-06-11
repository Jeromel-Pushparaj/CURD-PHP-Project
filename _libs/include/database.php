<?php

class Database
{
    public static $conn = null;

    public static function getConnection()
    {
        if(Database::$conn == null) {
            $servername = "localhost";
            $username = "jpt";
            $password = "pass";
            $dbname = "user_db";
            
            

            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);


            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            } else {
                Database::$conn = $connection;
                return Database::$conn;
                // print("creating new connection.");
            }
        } else {
            return Database::$conn;
        }
    }
}