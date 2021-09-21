<?php
    include 'C:/xampp/htdocs/web_development/db_connect.php';
    session_start();
    if(isset($_SESSION['logged in'])){
        $name =$_SESSION["username"];
        $sql1 = "SELECT * FROM `customer` WHERE cust_fname='$name'";
        $result = mysqli_query($conn,$sql1);
        $row = mysqli_fetch_assoc($result);
        $cust_id = $row['cust_id'];

    }
    
?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book my Ticket</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/web_development/css/mybooking.css?v=<?php echo time();?>">
<link rel="stylesheet" href="/web_development/css/nav.css?v=<?php echo time();?>">
<body>
    
    <?php require 'C:/xampp/htdocs/web_development/partials/nav.php'; ?>
    <h1 style="text-align: center;">MY BOOKING</h1>
    <table>
        <tr>
            <th>BOOKING ID</th>
            <th>Movie Name</th>
            <th>Show date</th>
            <th>booking Date</th>
            <th>Payment date</th>
        </tr>

        <tr>
        <?php
        $sql3 = "SELECT * FROM `booking` WHERE cust_id = '$cust_id'";
        $result3 = mysqli_query($conn,$sql3);
        while($row3 = mysqli_fetch_assoc($result3))
        {
            $booking_id=$row3['booking_id'];
            echo '<td>'.$booking_id.'</td>';
        }
        $sql ="select * from `movie` where mov_id in (select mov_id from `booking` where cust_id =' $cust_id')"; 
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {  

            $mov_name=$row['mov_name'];
            echo '<td>'.$mov_name.'</td>';
        }
        $sql3 = "SELECT * FROM `booking` WHERE cust_id = '$cust_id'";
        $result3 = mysqli_query($conn,$sql3);
        while($row3 = mysqli_fetch_assoc($result3))
        {
            $show_date=$row3['show_date'];
            echo '<td>'.$show_date.'</td>';
            $booking_date=$row3['booking_date'];
            echo '<td>'.$booking_date.'</td>';
        }    
        $sql3 = "SELECT * FROM `payment` WHERE cust_id = '$cust_id'";
        $result3 = mysqli_query($conn,$sql3);
        while($row3 = mysqli_fetch_assoc($result3))
        {
            $pay_date=$row3['pay_date'];
            echo '<td>'.$pay_date.'</td>';
        }   
        
        
        ?>
        </tr>
    </table>

        
   
    <footer class="footer">
            <div class="copyright">&copy; Copyright 2020. Movie Ticket Booking System. All Rights Reserved.</div>
    </footer>

</body>

</html>