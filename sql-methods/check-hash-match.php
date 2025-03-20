<?php
    function hashMatch($username, $stringPassword, $pdo) {
        $selectInformations = $pdo->prepare("SELECT * FROM user_list WHERE user_name = :user_name");        
        $selectInformations->bindParam("user_name", $username);
        $selectInformations->execute();

        $row = $selectInformations->fetch(PDO::FETCH_ASSOC);
        $hashPassword = $row["user_password"];
        
        $isPasswordCorrect = (bool) password_verify($stringPassword, $hashPassword);

        return $isPasswordCorrect;
    }
