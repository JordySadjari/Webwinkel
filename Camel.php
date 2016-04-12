<?php
if (isset($_POST['sign_up']))

{
    $username = $_POST['name'];
    $password = $_POST['pwd'];
    $text = $username . "||" . $password . "||";
    $fp = fopen('accounts.txt', 'a+');


    if (fwrite($fp, $text)) {
        echo 'Uw account is aangemaakt';

    }
    fclose ($fp);
}
?>

<?php
if (isset($_POST['sign_in']))
{
    $username = $_POST['name'];
    $password = $_POST['pwd'];

    $userData = file_get_contents('accounts.txt');

    $inputUser = $username . "||" . $password;

    $isItThere = strpos($userData, $inputUser);

    if ($isItThere === false){
        echo "Dit account bestaat nog niet<br>";
        session_start();
        $_SESSION['user'] = "";
        session_unset();
        session_destroy();
    }
    else {
        echo "U bent ingelogd als $username<br>";
        session_start();
        $_SESSION['user'] = $username;
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>EverydayCigs</title>
    <link rel="stylesheet" type="text/css" href="css/modaal.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/960_12_col.css">
    <link rel="icon" href="fotos/8852a.gif" type="image/x-icon">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
    <script src="js/modaalStart.js"></script>
    <script src="js/modaalVenster.js"></script>
</head>
<body>
       <div class="container_12">
        <div id="Banner" class="grid_12">
            <img src="navLogo.png" class="grid_4">

            <div id="LogReg" class="grid_4 omega">
                <?php
                // door Jordy Sadjari
                if(!isset($_SESSION))
                {
                    session_start();
                }
                if (isset($_SESSION['user'])) { ?>
                    <form action="endSession.php" method="post">
                        <input type="submit" value="Sign out" class="Login" id="O">
                    </form>
                    <?php
                    $sessie = $_SESSION['user'];
                    echo "Welkom $sessie";
                    ?>

                <?php }else{ ?>
                    <input type="button" value="Sign in" class="Login" id="L">
                    <input type="button" value="Sign up" class="Login" id="R">
                    <?php
                    echo "not logged in";
                }

                ?>



            </div>
          
        </div>

           <div id="Log">
               <form method="post" action="#">
                   <h1>Sign In</h1>
                   <p><label>Login Name:</label><input type="text" name="name" id="name" ></p>
                   <p><label>Password:</label><input type="password" name="pwd" id="pwd">
                   <p><input type="submit" id="sign_in" name="sign_in" value="Sign in" ></p>
               </form>
           </div>

           <div id="Reg">
               <form method="post" action="#">
                   <h1>Sign up</h1>
                   <p><label>Login Name:</label><input type="text" name="name" id="name" ></p>
                   <p><label>Password:</label><input type="password" name="pwd" id="pwd">
                   <p><input type="submit" id="sign up" name="sign up" value="Sign up" ></p>
               </form>
           </div>
        
        
        <div id="nav" class="grid_12">
            <ul>
                <li><a href="index.php" class="sliding-middle-out">Home</a></li>
                <li><a href="Marlboro.php" class="sliding-middle-out">Marlboro</a></li>
                <li><a href="King.php" class="sliding-middle-out">King</a></li>
                <li><a href="Gauloises.php" class="sliding-middle-out">Gauloises</a></li>
                <li><a href="Camel.php" class="sliding-middle-out active">Camel</a></li>
                <li><a href="contact.php" class="sliding-middle-out">Contact</a></li>
                <a href="winkelwagen.php"><img src="Fotos/winkelmandje.png" style="padding-left:2.3%; border-left: solid white 1px;" alt="noImg"></a>
            </ul>
        </div>
        <div id="producten" class="grid_12">
            <ul>
                <li class="product grid_6 alpha">
                    <div class="info">
                       <h2>$ 24,00</h2>
                        <p>Camel Black<br>
                        Made in EU (King Size Box )<br>
                        Tar 10mg, Nicotine 0,9mg</p><br>
                        <label>Aantal : </label><input type="number" value="0" class="selector">
                        <input type="button" value="Add to cart" class="Cart">
                    </div>
                <img src="Fotos/Camel/camel-black.png">
                </li>
                
                <li class="product grid_6 omega">
                    <div class="info">
                       <h2>$ 24,00</h2>
                        <p>Camel Blues<br>
                        Made in Europe (King Size Box)<br>
                        Tar 8mg, Nicotine 0,6mg</p><br>
                        <label>Aantal : </label><input type="number" value="0" class="selector">
                        <input type="button" value="Add to cart" class="Cart">
                    </div>
                <img src="Fotos/Camel/camel-blues.png">
                </li>
                
                <li class="product grid_6 alpha">
                    <div class="info">
                       <h2>$ 24,00</h2>
                        <p>Camel Mild<br>
                        Made in EU (King Size Box)<br>
                        Tar 9mg, Nicotine 0,7mg</p><br>
                        <label>Aantal : </label><input type="number" value="0" class="selector">
                        <input type="button" value="Add to cart" class="Cart">
                    </div>
                <img src="Fotos/Camel/camel-mild.png">
                </li>
                
                <li class="product grid_6 omega">
                    <div class="info">
                       <h2>$ 24,00</h2>
                        <p>Camel White<br>
                        Made in EU (King Size Box)<br>
                        Tar 8mg, Nicotine 0,7mg</p><br>
                        <label>Aantal : </label><input type="number" value="0" class="selector">
                        <input type="button" value="Add to cart" class="Cart">
                    </div>
                <img src="Fotos/Camel/camel-white.png">
                </li>
            </ul>
        </div>
           <div id="footer" class="grid_12">
               <div id="Products" class="grid_2">
                   <h3>Products</h3>
                   <ul>
                       <li>Marlboro</li>
                       <li>King</li>
                       <li>Gaouloises</li>
                       <li>Camel</li>
                   </ul>
               </div>
               <div id="EverydayCigs" class="grid_2">
                   <h3>EverydayCigs</h3>
                   <ul>
                       <li>About us</li>
                       <li><a href="terms.php">Terms and Con.</a></li>
                       <li>Contact</li>
                       <li>Cookies</li>
                   </ul>
               </div>
               <div id="Support" class="grid_2">
                   <h3>Support</h3>
                   <ul>
                       <li>Security</li>
                       <li>Payment</li>
                       <li>Refund</li>
                       <li>FAQ</li>
                   </ul>
               </div>
               <div id="Newsletter" class="grid_5">
                   <h3>Newsletter</h3>
                   <p>Sign up now to receive free coupons and exclusive deals</p>
                   <form>
                       <input type="email" id="Newsletterinput" placeholder="email">
                       <button id="Newsbutton"><span>Subscribe</span></button>
                   </form>
               </div>
               <div class="clear"></div>
               <div id="social" class="grid_5">
                   <img src="Fotos/social/Facebook.png" id="facebook" alt="facebook" >
                   <img src="Fotos/social/Twitter.png" id="twitter" alt="twitter" >
                   <img src="Fotos/social/Tumblr.png" id="tumblr" alt="tumblr" >
                   <img src="Fotos/social/Google+.png" id="google" alt="google" >
                   <img src="Fotos/social/Feed.png" id="feed" alt="feed" >
                   <img src="Fotos/social/Pinterest.png" id="pinterest" alt="pinterest" >
               </div>
           </div>
    </div>
</body>
</html>