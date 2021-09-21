<?php
    $r="fail";
    include 'C:/xampp/htdocs/web_development/db_connect.php';
    session_start();
            if(isset($_SESSION['logged in'])){
                $name =$_SESSION["username"];
                $sql1 = "SELECT * FROM `customer` WHERE cust_fname='$name'";
                $result = mysqli_query($conn,$sql1);
                $row = mysqli_fetch_assoc($result);
                $cust_id = $row['cust_id'];
            }
            $mov_id = $_GET['movid'];
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
              
                $noofticket= $_POST['noticket'];
                $theatre= $_POST['theatre'];
                $location=$_POST['location'];
                $showtype=$_POST['showtype'];
                $showdate=$_POST['showdate'];
                $seattype=$_POST['seattype'];
                $sql2 = "SELECT * FROM `showw` WHERE show_type='$showtype' AND mov_id='$mov_id'";
                $result2 = mysqli_query($conn,$sql2);
                while($row2 = mysqli_fetch_assoc($result2))
                {
                    $show_id = $row2['show_id'];
                    $screen_id = $row2['screen_id'];
                }
                $sql3="INSERT INTO `booking` (`cust_id`, `seat_type`, `show_id`,`mov_id`, `show_date`, `total_no_ticket`, `screen_id`, `booking_date`) VALUES ('$cust_id', '$seattype', '$show_id','$mov_id', '$showdate', '$noofticket', '$screen_id', current_timestamp());";
                $result3 = mysqli_query($conn,$sql3);
                if($result3)
                {
                    echo 'success';
                    $r='success';
                }
            }
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book my Ticket</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/web_development/css/booking.css?v=<?php echo time();?>">
<link rel="stylesheet" href="/web_development/css/nav.css?v=<?php echo time();?>">
<body>
<?php
    
        $id = $_GET['movid'];
        $sql = "SELECT * FROM `movie` WHERE mov_id=$id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $mov_id = $row['mov_id'];
            $movnam = $row['mov_name'];
            $movlan = $row['mov_lang'];
            $movcast = $row['mov_cast'];
            $movdire = $row['mov_director'];
            $movmus = $row['mov_musician'];
            $releasedt = $row['mov_release_date'];
            $trailer= $row['mov_trailer'];
            $movdesc = $row['mov_desc'];
        }
    ?>
    <?php 
    require 'C:/xampp/htdocs/web_development/partials/nav.php';
    
    ?>
    <h1 style="text-align: center;">BOOKING</h1>
    <div class="alert">
            <?php 
                if(isset($_SESSION['logged in']))
                {   
                    echo 'Heyyy '.$_SESSION["username"].' Ready for an EXCITING movie.Book your tickets';
                }
            ?>
            </div>
    
    <div class="container">
        <div class="login">
        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">

                <label for="noticket">Number of tickets</label>
                <div>
                    <input type="number" name="noticket" placeholder="Enter number of tickets" id="noticket" required>
                </div>
                <br>

                <label for="location">Enter location</label>
                <div>
                    <input type="text" name="location" placeholder="Enter location" id="location" required>
                </div>
                <br>
                <label for="theatre">Theatre</label>
                <div>
                    <select class="option" id="theatre" name="theatre">
                    <?php
                        
                        $sql = "select * from `theatre` where theatre_id in (select theatre_id from `showw` where mov_id = $mov_id)";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                                $theatre = $row['theatre_name'];
                                echo '<option value ='. $theatre.'>'.$theatre.'</option>';
                      
    
                        }
                    ?>
                    </select>
                </div>
                <br>

                <label for="showtype">Show type</label>
                <div>
                    <select class="option" id="showtype" name="showtype">
                    <?php
                        
                        $sql = "select * from `showw` where mov_id = $mov_id";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                                $show_type = $row['show_type'];
                                echo '<option value ='. $show_type.'>'. $show_type.'</option>';
                      
                        }
                    ?>
                    </select>
                </div>
                <br>

                <label for="seattype">Seat type</label>
                <div>
                    <select class="option" id="seattype" name="seattype">
                    <?php
                        
                        $sql = "select * from `seat`";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                                $seat_type = $row['seat_type'];
                                echo '<option value ='. $seat_type.'>'. $seat_type.'</option>';
                      
                        }
                    ?>    
                        
                    </select>
                    
                </div>
                <br>
                <label for="showdate">Show date</label>
                <div>
                    <input type="date" name="showdate" placeholder="show date" id="showdate" required>
                </div>
                <br>
                <div>
                <?php 
                    if(isset($_SESSION['logged in']))
                    {
                    	echo '<button type="submit" class="btn" >SUBMIT</button>';
                    }?>
                </div>
        </form>
        
        </div>
        <div class=details>
            <div class ="video">
                <?php echo $trailer;?>
                <ul class="list">
                    <li>Cast : <?php echo $movcast;?></li>
                    <li>Director : <?php echo $movdire;?></li>
                    <li>Music : <?php echo $movmus;?></li>
                    <li>Release Date : <?php echo $releasedt;?></li>
                    <li>Description : <?php echo $movdesc;?></li>
                </ul>
            </div> 
            <?php if(isset($_SESSION['logged in'])&& $r=="success")
            {   
                 echo '<a href="/web_development/payment.php?movid='. $mov_id .' " class="btn">MAKE PAYMENT</a>';
            }
            else
            {
            	echo 'LOGIN to proceed further Or Fill Your details to proceed. <a href="/web_development/signin.php">SIGN IN</a> ';
            }?>           
        </div>
    </div>                    
    <footer class="footer">
            <div class="copyright">&copy; Copyright 2020. Movie Ticket Booking System. All Rights Reserved.</div>
    </footer>

</body>

</html>