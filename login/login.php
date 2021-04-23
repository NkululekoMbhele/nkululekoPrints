<?php
session_start();
include_once("../class.user.php");

$login = new USER();

if ($login->is_loggedin() != "") {
    $login->redirect('../admin/admin.php');
}

if (isset($_POST['btn-login'])) {
    $uname = strip_tags($_POST['txt_uname_email']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);

    if ($login->doLogin($uname, $umail, $upass)) {
        $login->redirect('../admin/admin.php');
    } else {
        $error = "<b><font color='red'>Wrong Details !</font></b>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/content.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body>
    <header>
        <nav id="navbar">
            <div class="nav-wrapper">
                <a href="../index.php" class="logo">
                    <img src="../img/prints_logo.svg" alt="logo">
                </a>


                <!-- Collect the nav links, forms, and other content for toggling -->

                <ul class="menu">
                    <li><a class="link-home" href="../index.php">HOME</a></li>
                    <li><a class="link-about" href="../about.php">ABOUT</a></li>
                    <li><a class="link-contact" href="../contact.php">CONTACT</a></li>
                    <li><a href="../track.php">TRACK ORDER</a></li>
                    <li><a class="sign-up" href="sign-up.php">SIGN UP</a></li>

                </ul>
            </div>
            <div class="menuIcon">
                <span class="icon icon-bars"></span>
                <span class="icon icon-bars overlay"></span>
            </div>


            <div class="overlay-menu">

                <div class="list">
                    <a class="link-home" href="../index.php">HOME</a>
                    <a class="link-about" href="../about.php">ABOUT</a>
                    <a class="link-contact" href="../contact.php">CONTACT</a>
                    <a href="../track.php">TRACK ORDER</a>
                    <a class="sign-up" href="sign-up.php">SIGN UP</a>
                </div>
            </div>

        </nav>
    </header>

    <div id="main2">




        <h1>Sign In</h1>
        <form autocomplete="off" class="login-form" method="post">


            <?php
            if (isset($error)) {
            ?>
            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
            <?php
            }
            ?>



            <input type="text" name="txt_uname_email" autofill="off" autocomplete="off" placeholder="Username or Email"
                required />



            <input type="password" name="txt_password" placeholder="Password" />



            <input id="login-button" value="SIGN IN" type="submit" name="btn-login" class="button">



        </form>
        <p>Don't have account! <a href="sign-up.php">SIGN UP</a> </p>



    </div>

    <script src="../js/script.js"></script>

</body>

</html>