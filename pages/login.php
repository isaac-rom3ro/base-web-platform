<?php
    $signinError = $_GET["signin"];

    $emptyInputs = false;
    $emptyUsername = false;
    $emptyPassword = false;
    $incorrectUsername = false;

    if($signinError == "empty-inputs") {
        $emptyInputs = true;
    } else if($signinError == "empty-username") {
        $emptyUsername = true;
    } else if($signinError == "empty-password") {
        $username = $_GET["username"];
        
        $emptyPassword = true;
    } else if($signinError == "incorrect-username") {
        $username = $_GET["username"];

        $incorrectUsername = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../styles/input-error.css">
</head>
<body>
    <form action="../includes/user-login-check.php" method="POST">
        <?php
            if(!isset($signinError)) {
                echo "<input name='username' type='text' placeholder='Email'>";
            } else if($emptyInputs) {
                echo "<input name='username' class='error' type='text' placeholder='Username'>";
            } else if($emptyUsername) {
                echo "<input name='username' class='error' type='text' placeholder='Username'>";
            } else if($emptyPassword) {
                echo "<input name='username' type='text' value='$username' placeholder='Username'>";
            } else if($incorrectUsername) {
                echo "<input name='username' class='error' type='text' value='$username' placeholder='Username'>";
            }
        ?>

        <?php
            if(!isset($signinError)) {
                echo "<input name='password' type='password' placeholder='Password'>";
            } else if($emptyInputs) {
                echo "<input name='password' class='error' type='password' placeholder='Password'>";
            } else if($emptyUsername) {
                echo "<input name='password' type='password' placeholder='Password'>";
            } else if($emptyPassword) {
                echo "<input name='password' class='error' type='password' placeholder='Password'>";
            } else if($incorrectUsername) {
                echo "<input name='password' type='password' placeholder='Password'>";
            }
        ?>
        <button type="submit">Login</button>
    </form>
</body>
</html>