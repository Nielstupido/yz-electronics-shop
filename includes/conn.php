<?php

    //connect and check connection to database
    $host ='localhost';
    $db = 'ecommerceapp';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    
    try{
        $pdo = new PDO($dsn, $user, $pass);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
      die("ERROR: Could not connect to database. " . $e->getMessage());
    }

?>