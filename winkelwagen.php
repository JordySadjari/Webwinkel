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
                   <p><label>Login Name:</label><input type="text" name="name" id="name" /></p>
                   <p><label>Password:</label><input type="password" name="pwd" id="pwd"/>
                   <p><input type="submit" id="sign_in" name="sign_in" value="Sign in" /></p>
               </form>
           </div>

           <div id="Reg">
               <form method="post" action="#">
                   <h1>Sign up</h1>
                   <p><label>Login Name:</label><input type="text" name="name" id="name" /></p>
                   <p><label>Password:</label><input type="password" name="pwd" id="pwd"/>
                   <p><input type="submit" id="sign up" name="sign up" value="Sign up" /></p>
               </form>
           </div>
        
        <div id="nav" class="grid_12">
            <ul>
                <li><a href="index.php" class="sliding-middle-out">Home</a></li>
                <li><a href="Marlboro.php" class="sliding-middle-out">Marlboro</a></li>
                <li><a href="King.php" class="sliding-middle-out">King</a></li>
                <li><a href="Gauloises.php" class="sliding-middle-out">Gauloises</a></li>
                <li><a href="Camel.php" class="sliding-middle-out">Camel</a></li>
                <li><a href="contact.php" class="sliding-middle-out">Contact</a></li>
                <a href="winkelwagen.php"><img src="Fotos/winkelmandje.png" style="padding-left:2.3%; border-left: solid white 1px;" alt="noImg"></a>
            </ul>
        </div>
        <table class="product-table grid_12">
            <thead>
                <tr>
                    <th style="width: 400px; border-left: solid black 2px;
    border-top: solid black 2px;
    border-bottom: solid black 2px;">Artikel</th>
                    <th class="short">Prijs per stuk</th>
                    <th class="short">Aantal</th>
                    <th class="short" style="border-right: solid black 2px">Totaal</th>
                </tr>
            </thead>
        </table>
    </div>
</body>
</html>