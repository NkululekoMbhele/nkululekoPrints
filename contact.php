<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Posters</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <style>
    .sentMessage {
        display: block;
        padding: 50px;
        border: 2px solid #555;
        z-index: 3;
        text-align: center;
        position: absolute;
        background-color: #fff;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);

    }

    .sentMessage a {
        text-decoration: none;
        color: #222;
        font-size: 12px;
        position: absolute;
        right: 5px;
        top: 5px;

    }
    </style>
</head>

<body>

    <?php

    require_once 'connection/dbconfig.php';


    if (isset($_POST['send'])) {
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Subject = $_POST['subject'];
        $Message = $_POST['message'];
        $cdate = date('Y-m-d');
        if (empty($Name) || empty($Email) || empty($Subject) || empty($Message)) {
            header('location:contact.php?error');
        } else {
            $to = "admin@nkululeko.io";

            if (mail($to, $Subject, $Message, $Email)) {
                header("location:contact.php?success");
            }
        }



        try {

            $stmt = $db_con->prepare("INSERT INTO message(name, subject, email, message,cdate)
 			VALUES(:nm, :sb, :em, :sms,:cd)");

            $stmt->bindParam(":nm", $Name);
            $stmt->bindParam(":sb", $Subject);
            $stmt->bindParam(":em", $Email);
            $stmt->bindParam(":sms", $Message);
            $stmt->bindParam(":cd", $cdate);


            if ($stmt->execute()) {
                echo '<div class="sentMessage"><b>
		<font color="green">Congratulation! <br>
		Message submitted successfully. I will try to respond back shortly.</font></b>
		<a href="contact.php">close</a>
		</div>';
            } else {
                echo "Query Problem";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    ?>

    <?php include 'includes/navbar.php'; ?>

    <div class="contact" id="contact">
        <h1>Contact</h1>

        <?php
        $msg = "";
        if (isset($_GET['error'])) {
            $msg = "Please fill in the Blanks";

            echo  '<p class="errorMessage">' . $msg . '</p>';
        }
        if (isset($_GET['success'])) {
            $msgSent = "Message Sent";

            echo  '<p class="successMessage">' . $msgSent . '</p>';
        }

        ?>


        <form class="contact-form" action="contact.php" method="post">

            <input type="text" name="name" id="" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="subject" id="" placeholder="Subject">
            <textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>
            <input name="send" type="submit" value="Send">
        </form>

        <div class="randomPicture">
            <img style="margin-top:50px;" src="./img/contact.jpg" height="100px" alt="">
        </div>
    </div>




    <?php include 'includes/footer.php'; ?>

    <script>
    const activeElement = document.querySelector(".link-contact");
    activeElement.style.color = "#124f9e";
    activeElement.style.cursor = "none";

    var copyRight = document.querySelector("#copyright");
    var time = new Date();
    var year = time.getFullYear();
    copyRight.innerHTML = "Copyrights &copy; " + year +
        " All right reserved. Designed by <strong><a href='index.php' style='textDecoration:none;'>Nkululeko Mbhele</a></strong>";
    </script>

    <script src="../js/script.js"></script>
</body>