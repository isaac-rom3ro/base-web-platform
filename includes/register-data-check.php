<?php  
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $emptyUsername = (bool) empty($username);
        $emptyPassword = (bool) empty($password);

        if($emptyUsername && $emptyPassword) {
            header("Location: ../index.php?signup=empty-inputs");
        } else if(!$emptyUsername && $emptyPassword) {
            header("Location: ../index.php?signup=empty-password&username=$username");
        } else if($emptyUsername && !$emptyPassword) {
            header("Location: ../index.php?signup=empty-username");
        } else {
            try {
                include_once "../sql-methods/check-user-exists.php";
                include_once "../connection/connection-pdo.php";

                if(checkIfUserExistsByUsername($username, $pdo)) {
                    header("Location: ../index.php?signup=username-exists&username=$username");
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);

                    $insertNewUser = $pdo->prepare("INSERT INTO user_list (user_name, user_password) VALUES (:user_name, :user_password)");
                    $insertNewUser->bindParam("user_name", $username);
                    $insertNewUser->bindParam("user_password", $hash);
                    $insertNewUser->execute();
                }
            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }
    }