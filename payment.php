<?php
    include 'C:/xampp/htdocs/web_development/db_connect.php';
    session_start();
    $r="fails";
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
<link rel="stylesheet" href="/web_development/css/payment.css?v=<?php echo time();?>">
<link rel="stylesheet" href="/web_development/css/nav.css?v=<?php echo time();?>">
<body>
    
    <?php require 'C:/xampp/htdocs/web_development/partials/nav.php'; ?>
    <h1 style="text-align: center;">PAYMENT</h1>
    <?php
        $mov_id = $_GET['movid'];
        
        $sql3 = "SELECT * FROM `booking` WHERE cust_id = '$cust_id' AND mov_id = '$mov_id'";
        $result3 = mysqli_query($conn,$sql3);
        while($row3 = mysqli_fetch_assoc($result3))
        {
            $booking_id=$row3['booking_id'];
            $show_id=$row3['show_id'];
            $seat_type=$row3['seat_type'];
            $no_of_ticket=$row3['total_no_ticket'];
        }
        
        $sql2 = "SELECT * FROM `seat` WHERE seat_type = '$seat_type'";
        $result2 = mysqli_query($conn,$sql2);
        while($row2 = mysqli_fetch_assoc($result2))
        {
            $price=$row2['price'];
        
        }

    ?>
    
        
        <div>
        <?php $total_amount=$price*$no_of_ticket;?>
        Total amount : <?php echo $total_amount?>
        </div>
        
        <form action="<?php echo $_SERVER["REQUEST_URI"];?>"  class="payment" method="POST">

                <label for="cardno">card number</label>
                <div>
                    <input type="number" name="cardno" placeholder="Enter your card number" id="cardno" required>
                </div>
                <br>
                <label for="cardname">card name</label>
                <div>
                    <input type="text" name="cardname" placeholder="Enter your card name" id="cardname" required>
                </div>
                <br>
                <label for="cardcvv">card cvv number</label>
                <div>
                    <input type="number" name="cardcvv" placeholder="Enter your card cvv name" id="cardcvv" required>
                </div>
                <br>
        
                <label for="expiryyear">card expiry year</label>
                <div>
                    <input type="number" name="expiryyear" placeholder="Enter your expiry year" id="expiryyear" required>
                </div>
                <br>
                
                <div>
                    <button type="submit" class ="btn">submit</button>
                </div>
            
        </form>
    
            
        
   
    <footer class="footer">
            <div class="copyright">&copy; Copyright 2020. Movie Ticket Booking System. All Rights Reserved.</div>
    </footer>

</body>

</html>
<?php
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            
            $card_no = $_POST['cardno'];
            $card_name = $_POST['cardname'];
            $card_cvv = $_POST['cardcvv'];
            $card_expiry =$_POST['expiryyear'];
            $sql4="INSERT INTO `payment` (`cust_id`, `booking_id`, `card_no`, `card_name`, `card_expiry`, `card_cvv`, `pay_date`, `total_amount`)VALUES ('$cust_id','$booking_id','$card_no','$card_name','$card_expiry','$card_cvv', current_timestamp(),'$total_amount')";
            $result = mysqli_query($conn,$sql4);
            if($result)
                {
                    $r="success";
                }
        }
        /*if($r=="fails")
        {
            $sql5="delete from booking where booking_id=$booking_id";
            $result = mysqli_query($conn,$sql5);

        }*/
    ?>