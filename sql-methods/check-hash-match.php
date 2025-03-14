<?php
    function hashMatch($username, $stringPassword, $pdo) {
        $selectLogin = $pdo->prepare("SELECT * FROM user_list WHERE user_name = :user_name");
        $selectLogin->bindParam("user_name", $username);
        $selectLogin->execute();

        $hashTest = password_hash($stringPassword, PASSWORD_DEFAULT);

        $fetchInfo = $selectLogin->fetch(PDO::FETCH_ASSOC);
        $hashFromDatabase = $fetchInfo["user_password"];

        echo "$hashTest \n $hashFromDatabase";
    }
