<?php
function getConnection() {
    $host = 'localhost';
    $dbname = 'gestion_universitaire';
    $username = 'papis';
    $password = 'Passer2020@';
    
    try {
        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    } catch(Exception $e) {
        die("Connection error: " . $e->getMessage());
    }
}