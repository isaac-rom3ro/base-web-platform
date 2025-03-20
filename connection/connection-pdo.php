<?php
    try {
        $host = ""; 
        $dbname = "";
        $charset = "";
        $user = "";
        $hostPassword = "";

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", 
        "$user", 
        "$hostPassword");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(Exception $e) {
        echo $e->getMessage();
    }