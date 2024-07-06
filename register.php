<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $uname1 = $_POST['uname1'];
    $email = $_POST['email'];
    $upswd1 = $_POST['upswd1'];
    $upswd2 = $_POST['upswd2'];

    if (!empty($uname1) && !empty($email) && !empty($upswd1) && !empty($upswd2)) {
        $query = "INSERT INTO register (uname1, email, upswd1, upswd2) VALUES ('$uname1', '$email', '$upswd1', '$upswd2')";
        mysqli_query($conn, $query);

        echo "<script type='text/javascript'>alert('Successfully registered')</script>";

        // Redirect to abcd.html
        header("Location: abcd.html");
        exit; // Important to terminate the script after redirection
    } else {
        echo "<script type='text/javascript'>alert('Please enter valid values')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Form Design</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div class="box">
        <img src="face.png" class="user">
        <h1>Register Here</h1>
        <form  method="post">
            <p>Username</p>
            <input type="text" name="uname1" placeholder="Enter Username" required>
            <p>Email</p>
            <input type="email" name="email" placeholder="Enter email id" required>
            <p>Password</p>
            <input type="password" name="upswd1" placeholder="Enter Password" required>
            <p>Retype Password</p>
            <input type="password" name="upswd2" placeholder="Re-Enter Password" required>
            <input type="submit" value="Register">
            <br><br>
            <a href="index.php">Existing user, login!</a>
        </form>
    </div>
</body>
</html>
