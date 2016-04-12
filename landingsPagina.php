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

<!DOCTYPE html>
<html>
<head>
    <title>EverydayCigs</title>
    <link rel="stylesheet" type="text/css" href="css/styleLand.css">
    <link rel="stylesheet" type="text/css" href="css/960_12_col.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="wrapper" class="container_12" style="background-color: dodgerblue">
        <div id="Section">
        <img src="navLogo.png">
            <br>
            <p>two for the price of one</p>
            <img src="Fotos/King/king-blue.png">
            <img src="Fotos/King/king-classic.png">
            <br>
            <p>20% sale on all marlboro cigarettes</p>
            <img src="Fotos/malboro/marlboro-black-menthol.png">
            <img src="Fotos/malboro/marlboro-flavor-mix.png">
        <h1>Sign up now to get in on all of these exclusive deals!</h1>
            <form method="post" action="signedUp.php">
                <table id="form">
                        <tr><label>Username</label></tr>
                        <br>
                        <tr><input type="text" name="name" id="name" required></tr>
                        <br>
                        <tr><label>Password</label></tr>
                        <br>
                        <tr><input type="password" name="pwd" id="pwd" required></tr>
                        <br>
                        <tr><label>E-mail</label></tr>
                        <br>
                        <tr><input type="email" required></tr>
                </table>
                <input type="submit" id="sign_up" name="sign_up" value="Press here to sign up!">

                </script>
            </form>
        </div>
    </div>
</body>
</html>