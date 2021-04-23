<?php
session_start();
require_once('../class.user.php');
$user = new USER();

if ($user->is_loggedin() != "") {
    $user->redirect('../admin/admin.php');
}

if (isset($_POST['btn-signup'])) {
    $uname = strip_tags($_POST['txt_uname']);
    $umail = strip_tags($_POST['txt_umail']);
    $upass = strip_tags($_POST['txt_upass']);


    if ($uname == "") {
        $error[] = "<b><font color='red'>provide username !</font></b>";
    } else if ($umail == "") {
        $error[] = "<b><font color='red'>provide email id !";
    } else if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {  // name@example.com
        $error[] = "<b><font color='red'>Please enter a valid email address !</font></b>";
    } else if ($upass == "") {
        $error[] = "<b><font color='red'>provide password !</font></b>";
    } else if (strlen($upass) < 6) {
        $error[] = "<b><font color='red'>Password must be atleast 6 characters</font></b>";
    } else {
        try {
            $stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
            $stmt->execute(array(':uname' => $uname, ':umail' => $umail));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['user_name'] == $uname) {
                $error[] = "<b><font color='red'>sorry username already taken !</font></b>";
            } else if ($row['user_email'] == $umail) {
                $error[] = "<b><font color='red'>sorry email id already taken !</font></b>";
            } else {
                if ($user->register($uname, $umail, $upass)) {
                    $user->redirect('sign-up.php?joined');
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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
                    <li><a class="sign-in" href="login.php">SIGN IN</a></li>

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
                    <a class="sign-in" href="login.php">SING IN</a>
                </div>
            </div>

        </nav>
    </header>
    <div id="main2">


        <h1>Sign up</h1>
        <form autocomplete="off" class="login-form" method="post">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
            ?>
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
            </div>
            <?php
                }
            } else if (isset($_GET['joined'])) {
                ?>
            <div class="alert alert-info">
                <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a>
                here
            </div>
            <?php
            }
            ?>

            <input type="text" class="form-control" name="txt_uname" placeholder="Username" value="<?php if (isset($error)) {
                                                                                                        echo $uname;
                                                                                                    } ?>" />


            <input type="text" class="form-control" name="txt_umail" placeholder="Email" value="<?php if (isset($error)) {
                                                                                                    echo $umail;
                                                                                                } ?>" />


            <input type="password" class="form-control" name="txt_upass" placeholder="Password" />


            <input id="login-button" value="SIGN UP" type="submit" class="button" name="btn-signup">


        </form>
        <p>Have an account ! <a href="login.php">SIGN IN</a></p>


    </div>

    <script src="../js/script.js"></script>
</body>

</html>