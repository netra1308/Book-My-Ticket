<?php
$loggedin = false;
if(isset($_SESSION['logged in']) && $_SESSION['logged in'] == true){
    $loggedin = true;
}
echo '<header>
<div class="left">
    <img src="/web_development/images/logo.jpg" >
    <div>MOVIE TICKET BOOKING</div>
</div>
<div class="mid">
    <nav class="navbar">
        <ul>
            <li><a href="/web_development/index.php">HOME</a></li>
            <li><a href="/web_development/services.php">OUR SERVICES</a></li>';
            if(!$loggedin)
            {
                echo '<li><a href="/web_development/signin.php" >SIGN IN</a></li>';
            }
            if($loggedin)
            {
                echo '<li><a href="/web_development/mybooking.php" >MY BOOKING</a></li>';
                echo '<li><a href="/web_development/signout.php" >LOGOUT</a></li>';
                
            }
            if($loggedin||!$loggedin)
            {
            echo '
            <li><a href="/web_development/contact.php" >CONTACT US</a></li>';}
        echo '</ul>
    </nav>
</div>
</header>';
?>