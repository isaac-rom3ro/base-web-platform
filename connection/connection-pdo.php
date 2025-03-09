<?php
    try {
        $host = getevn(); 
        $dbname = getevn();
        $charset = getevn();
        $user = getevn();
        $password = getevn();

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", 
        "$user", 
        "$password");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(Exception $e) {
        echo $e->getMessage();
    }