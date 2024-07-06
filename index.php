<?php
    session_start();
    include("db.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $uname1 = $_POST['uname1'];
        $upswd1 = $_POST['upswd1'];
        if (!empty($uname1) && !empty($upswd1)) {
            $query = "select * from register where uname1 = '$uname1' limit 1";
            $result = mysqli_query($conn, $query);

            if ($result) {
                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
                    if ($user_data['upswd1'] == $upswd1) {
                        header("location: abcd.html");
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'>alert('Wrong username and password')</script>";
        } else {
            echo "<script type='text/javascript'>alert('Please enter both username and password')</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div class="box">
        <img src="face.png" class="user">
        <h1>Login Here</h1>
        <form method="POST">
            <p>Username</p>
            <input type="text" name="uname1" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="upswd1" placeholder="Enter Password" required>
            <input type="submit" value="Login">
            <br><br>
            <a href="register.php">Register for a new account?</a>
        </form>
    </div>
</body>
</html>
