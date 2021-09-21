<?php
    include 'C:/xampp/htdocs/web_development/db_connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book my Ticket</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/web_development/css/index.css?v=<?php echo time();?>">

<link rel="stylesheet" href="/web_development/css/nav.css?v=<?php echo time();?>">
<body>
    <img  class="theatre" src="/web_development/images/theatre.jpg" >
    <?php require 'C:/xampp/htdocs/web_development/partials/nav.php'; ?>
  
    <div class="alert">
        <?php 
            if(isset($_SESSION['logged in']))
            {   
                echo '<strong> Helloooo '.$_SESSION["username"].'</strong>';
    
            }
        ?>
    </div>
    <br>
    <div class="content">
        Remember those days standing in a long queue for booking ticket was so irritating.<br> <strong>MOVIE TICKET BOOKING SYSTEM</strong> have brought to our service booking ticket at just one click.
        <br>Book movie tickets and earn exclusive DISCOUNTS AND OFFERS on large booking.
    </div>
    <h1>NOW SHOWINGS</h1>
    <div class="container">
        <?php
            $sql = "SELECT * FROM `movie`";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {   
                $id = $row['mov_id'];
                $mov = $row['mov_name'];
                $img = $row['mov_img'];
                echo 
                '<div class="item">
                    
                    <img class="mov" src="/web_development/images/'.$img.'">
                    <form class="form">
                        
                        <div>
                            <a href="/web_development/booking.php?movid='. $id . '" class="btn">BOOK NOW</a>
                        </div>
                    </form>
                </div>
                ';
            }
        ?> 
    </div>
    <br>
    <footer class="footer">
            <div class="copyright">&copy; Copyright 2020. Movie Ticket Booking System. All Rights Reserved.</div>
    </footer>

</body>

</html>