<?php
    include 'C:/xampp/htdocs/web_development/db_connect.php';
    session_start();

     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactus</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/contact.css?v=<?php echo time();?>">
<link rel="stylesheet" href="/web_development/css/nav.css?v=<?php echo time();?>">
<body>
    <?php require 'C:/xampp/htdocs/web_development/partials/nav.php'; ?>
    <h1 class="heading">CONTACT US</h1>
    <form  method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="login">
        <label for="fname">First Name</label>
        <div>
            <input type="text" name="myfname" placeholder="Enter your first name" id="fname" required>
        </div>
        <br>
        <label for="mobno">Mobile Number</label>
        <div>
            <input type="number" name="mymobno" placeholder="Enter your mobile number" id="mobno" required>
        </div>
        <br>
        <label for="email">Email ID</label>
        <div>
            <input type="email" name="myemail" placeholder="Enter your email id" id="email" required>
        </div>
        <br>
        <label for="message">Message: </label>
        <div>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </div>
        <br>
        <div>
            <button type="submit" class="btn" >Submit</button> 
        </div>
        <br>
    </form>
        <footer class="footer">
            <div class="copyright">&copy; Copyright 2020. Movie Ticket Booking System. All Rights Reserved.</div>
        </footer>
</body>
</html>