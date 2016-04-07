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

        session_start();
        $_SESSION['user'] = $username;
    }
}
?>


<html>
<head>
    <title>EverydayCigs</title>
    <link rel="stylesheet" type="text/css" href="css/modaal.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/960_12_col.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
    <script src="js/modaalStart.js"></script>
    <script src="js/modaalVenster.js"></script>
</head>
<body>
       <div class="container_12">
        <div id="Banner" class="grid_12">
            <img src="navLogo.png" class="grid_4">
            <div id="Searchbar" class="grid_4">
            <input type="text" id="Search" placeholder="zoeken...">
            <input type="button" id="SearchButton" value="Zoek">
            </div>
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
                   <p><label>Login Name:</label><input type="text" name="name" id="name"/></p>
                   <p><label>Password:</label><input type="password" name="pwd" id="pwd"/></p>
                   <p><input type="submit" id="sign_in" name="sign_in" value="Sign in" class="logbut"/></p>
               </form>
           </div>

           <div id="Reg">
               <form method="post" action="#">
                   <h1>Sign up</h1>
                   <p><label>Login Name:</label><input type="text" name="name" id="name" /></p>
                   <p><label>Password:</label><input type="password" name="pwd" id="pwd"/>
                   <p><input type="submit" id="sign up" name="sign up" value="Sign up" class="logbut" /></p>
               </form>
           </div>
        
        <div id="nav" class="grid_12">
            <ul>
                <li><a href="index.php" class="sliding-middle-out">Home</a></li>
                <li><a href="Marlboro.php" class="sliding-middle-out">Marlboro</a></li>
                <li><a href="King.php" class="sliding-middle-out">King</a></li>
                <li><a href="Gauloises.php" class="sliding-middle-out">Gauloises</a></li>
                <li><a href="Camel.php" class="sliding-middle-out">Camel</a></li>
                <li><a href="contact.php" class="sliding-middle-out active">Contact</a></li>
                <a href="winkelwagen.php"><img src="Fotos/winkelmandje.png" style="padding-left:2.3%; border-left: solid white 1px;" alt="noImg"></a>
            </ul>
        </div>
        
        <div style="margin-left: 10px; margin-top: 16%;">
        <h1>Contact</h1>
        <p>Do you have a question or a remark? We are glad to hear you out!</p>
        <h2>Email:</h2>
        <p>info@EDC.nl</p>
        <h2>Email return &amp; warranty:</h2>
        <p>RetWar@EDC.nl</p>
        <h2>customer service number:</h2>
        <p>1-986-859-4378</p>
        <h2>Customer service calling hours:</h2>
        <p> Monday: 12.00 pm till 6.00 am.<br>
            Tuesdag till Friday: 9.00 pm till 6.00 am.<br>
            Saturday &amp; Sunday: Closed.</p>
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
                    <li>Terms and Con.</li>
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
        </div>
        
    </div>
</body>
</html>