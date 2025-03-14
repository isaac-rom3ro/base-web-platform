<?php
    function checkUserMatchWithUsername($username, $pdo) {
        $selectLogin = $pdo->prepare("SELECT user_name FROM user_list WHERE user_name = :user_name");
        $selectLogin->bindParam("user_name", $username);
        $selectLogin->execute();
        
        $isUsernameRegistered = (bool) ($selectLogin->rowCount() > 0)? true: false;

        return $isUsernameRegistered;
    }  