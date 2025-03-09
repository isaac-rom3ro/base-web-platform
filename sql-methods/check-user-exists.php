<?php
    function checkIfUserExistsByUsername($username, $pdo) {
        $userExists = false;

        $selectUser = $pdo->prepare("SELECT * FROM user_list WHERE user_name = :user_name");
        $selectUser->bindParam("user_name", $username);
        $selectUser->execute();

        if($selectUser->rowCount() > 0) {
            $userExists = true;
        }

        if($userExists) {
            return true;
        } else {
            return false;
        }
    }