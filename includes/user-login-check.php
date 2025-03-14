<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $isUsernameEmpty = (bool) empty($username);
        $isPasswordEmpty = (bool) empty($password);

        if($isUsernameEmpty && $isPasswordEmpty) {
            header("Location: ../pages/login.php?signin=empty-inputs");
        } else if($isUsernameEmpty && !$isPasswordEmpty) {
            header("Location: ../pages/login.php?signin=empty-username");
        } else if(!$isUsernameEmpty && $isPasswordEmpty) {
            header("Location: ../pages/login.php?signin=empty-password&username=$username");
        } else {
            $stringPassword = $password;

            include_once "../connection/connection-pdo.php";
            include_once "../sql-methods/check-user-match.php";

            if(!checkUserMatchWithUsername($username, $pdo)) {
                header("Location: ../pages/login.php?signin=incorrect-username&username=$username");
            } else {
                include "../sql-methods/check-hash-match.php";

                hashMatch($username, $stringPassword, $pdo);
            }
        }
    }
