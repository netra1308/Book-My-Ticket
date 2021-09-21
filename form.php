<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $showalert = false;
        include 'C:/xampp/htdocs/web_development/db_connect.php';
        $username = $_POST['fname'];
        $city = $_POST['city'];
        $pincode = $_POST['pincode'];
        $email = $_POST['email'];
        $mobno = $_POST['mobno'];
        $password = $_POST['pwd'];
        $cpassword= $_POST['pwd-repeat'];
        $existsql = "select * from customer where cust_email = '$email'";
        $r = mysqli_query($conn , $existsql);
        $existrow = mysqli_num_rows($r);
        if($existrow > 0)
        {
            echo "email already registered ";
        }
        else
        {
            if($password==$cpassword){
                $sql="INSERT INTO `customer` (`cust_fname`, `cust_city`, `cust_pincode`, `cust_email`, `cust_mobno`, `cust_password`) VALUES ('$username', '$city', '$pincode', '$email', '$mobno', '$password')";
                $result = mysqli_query($conn , $sql);
                if($result)
                {
                    echo "success";
                }
            }
            else{
                echo "password do not match";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    
</head>
<link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/web_development/css/form.css?v=<?php echo time();?>">
<link rel="stylesheet" href="/web_development/css/nav.css?v=<?php echo time();?>">


<body>
    <?php require 'C:/xampp/htdocs/web_development/partials/nav.php'; ?>    
    <h1 class="heading">REGISTER</h1>
   
    <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="login">

        <label for="fname">User Name</label>
        <div>
            <input type="text" name="fname" placeholder="Enter your first name" id="fname" required >
        </div>
        <br>
        
        <label for="city">City</label>
        <div>
            <input type="text" name="city" placeholder="Enter your city" id="city" required>
        </div>
        <br>
        <label for="pincode">Pincode</label>
        <div>
            <input type="number" name="pincode" placeholder="Enter your pin code" id="pincode" required>
        </div>
        <br>
        <label for="email">Email ID</label>
        <div>
            <input type="email" name="email" placeholder="Enter your email id" id="email" required>
        </div>
        <br>
        <label for="mobno">Mobile Number</label>
        <div>
            <input type="number" name="mobno" placeholder="Enter your mobile number" id="mobno" required>
        </div>
        <br>
        <label for="pwd">Password</label>
        <div>
            <input type="password" name="pwd" placeholder="create a password" id="pwd" required>
        </div>
        <br>
        <label for="pwd-repeat"> Re-enter Password</label>
        <div>
            <input type="password" name="pwd-repeat" placeholder="Re enter password" id="pwd-repeat" required>
        </div>
        

        <br>
        <div>
            <button type="submit" class="btn"> Register</button>
        </div>
        <div class="container signin">
            <p>Already have an account? <a href="/web_development/signin.php">Sign in</a>.</p>
        </div>
    </form>
    <footer class="footer">
        <div class="copyright">&copy; Copyright 2020.Movie Ticket Booking System. All Rights Reserved.</div>
    </footer>

</body>

</html>