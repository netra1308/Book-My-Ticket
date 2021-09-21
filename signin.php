<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include 'C:/xampp/htdocs/web_development/db_connect.php';
        $username = $_POST['fname'];
        $password = $_POST['pwd'];

        $sql="select * from customer where cust_fname = '$username' AND cust_password = '$password' ";
        $result = mysqli_query($conn , $sql);
        $num = mysqli_num_rows($result);
        if($num==1)
        {
            echo "you are successfuly signed in";
            session_start();
            $_SESSION['logged in'] = true;
            $_SESSION['username'] = $username;
            header("location: index.php");
        }
        else 
        {
                echo "invalid credentials";
        }
       
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/web_development/css/signin.css?v=<?php echo time();?>">
<link rel="stylesheet" href="/web_development/css/nav.css?v=<?php echo time();?>">
<body>
    <?php require 'C:/xampp/htdocs/web_development/partials/nav.php'; ?>
    <h1 class="heading">LOGIN</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="login" method="POST">

        <label for="fname">User Name</label>
        <div>
            <input type="text" name="fname" placeholder="Enter your username" id="fname" required>
        </div>
        <br>
        
        <label for="pwd">Password</label>
        <div>
            <input type="password" name="pwd" placeholder="Enter your password" id="pwd" required>
        </div>
        <br>
        
        <div>
            <button type="submit" class="btn"> Sign IN</button>
        </div>
        <div class="container signin">
            <p>Do not have an account? <a href="/web_development/form.php">Register</a>.</p>
        </div>
    </form>
    <footer class="footer">
        <div class="copyright">&copy; Copyright 2020.Movie Ticket Booking System. All Rights Reserved.</div>
    </footer>
</body>
</html>