<?php
    $signupError = $_GET["signup"];

    $emptyInputs = false;
    $emptyPassword = false;
    $emptyUsername = false;
    $usernameExists = false;

    if($signupError == "empty-inputs") {
        $emptyInputs = true;
    } else if($signupError == "empty-username") {
        $emptyUsername = true;
    } else if($signupError == "empty-password") {
        $username = $_GET["username"];

        $emptyPassword = true;
    } else if($signupError == "username-exists") {
        $username = $_GET["username"];

        $usernameExists = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submit</title>
    <link rel="stylesheet" href="./styles/input-error.css">
</head>
<body>

    <?php
        if($emptyInputs) {
            echo "Fill the inputs";
        } else if($emptyPassword) {
            echo "Type your password";
        } else if($emptyUsername) {
            echo "Type your username";
        } else if($usernameExists) {
            echo "Ops username already registered!";
        }
    ?>

    <form action="./includes/register-data-check.php" method="POST">
        <?php
            if(!isset($signupError)) {
                echo "<input name='username' type='text' placeholder='Username'>";
            } else if($emptyInputs) {
                echo "<input name='username' class='error' type='text' placeholder='Username'>";        
            } else if($emptyPassword) {
                echo "<input name='username' type='text' placeholder='Username' value='$username'>";
            } else if($emptyUsername) {
                echo "<input name='username' class='error' type='text' placeholder='Username'>";
            } else if($usernameExists) {
                echo "<input name='username' class='error' type='text' placeholder='Username' value='$username'>";
            }
        ?>

        <?php
            if(!isset($signupError)) {
                echo "<input name='password' type='password' placeholder='Password'>";
            } else if($emptyInputs) {
                echo "<input name='password' class='error' type='password' placeholder='Password'>"; 
            } else if($emptyPassword) {
                echo "<input name='password' class='error' type='password' placeholder='Password'>";
            } else if($emptyUsername) {
                echo "<input name='password' type='password' placeholder='Password'>";
            } else if($usernameExists) {
                echo "<input name='password' type='password' placeholder='Password'>";
            }
        ?>

        <button type="submit">Register</button>
    </form>
</body>
</html>