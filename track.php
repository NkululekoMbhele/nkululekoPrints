<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Track Your Order</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/content.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <div id="track-content">
        <h1>Track Your Order </h1>
        <form method='post' action="track.php">

            <table class="track-table">





                <tr>
                    <td class="orderNumber">Order No</td>
                    <td><input class="orderInput" type='text' name='search' placeholder='' required /></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button class="trackButton" type="submit" class="button">
                            TRACK
                        </button>
                    </td>
                </tr>

            </table>
        </form>

        </center>
        <br><br>

        <?php
        require_once 'connection/dbconfig.php';


        //**********************************************
        require_once 'connection/dbconfig.php';

        if (isset($_GET['myid'])) {

            $myid = $_GET['myid'];

            $stmt = $db_con->prepare("SELECT * FROM ordrs WHERE myid = $myid");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


            $img = $row['img'];
            $name =  $row['name'];
            $ordr = $row['ordr'];
            $pr = $row['pr'];
            $cdate =  $row['cdate'];
            $sts = $row['sts'];


            echo '
  <div class="item1">

  <span><img src="' . $img . '"><span>

  </div>
  ';

            echo '
  <div class="item1">
  <button class="button"> Price ' . $pr . '</button><br>
  <span><b>Order No</b><br>' . $myid . '<span><br>
  <span><b>Name</b><br>' . $name . '<span><br>
  <span><b>Order</b><br>' . $ordr . '<span><br>
  <b><b>Order Date </b>' . $cdate . '</b><br>
  <button class="button"> ' . $sts . ' </button>
  </div>

  ';
        }

        if (isset($_POST['search'])) {


            $myid = $_POST['search'];


            $stmt = $db_con->prepare("SELECT * FROM ordrs WHERE myid = $myid");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


            $img = $row['img'];
            $name =  $row['name'];
            $ordr = $row['ordr'];
            $pr = $row['pr'];
            $cdate =  $row['cdate'];
            $sts = $row['sts'];


            echo '
  <div class="item1">

  <span><img src="' . $img . '"><span>

  </div>
  ';

            echo '
  <div class="item1">
  <button class="button"> Price ' . $pr . '</button><br>
  <span><b>Course No</b><br>' . $myid . '<span><br>
  <span><b>Name</b><br>' . $name . '<span><br>
  <span><b>Course</b><br>' . $ordr . '<span><br>
  <b><b>Order Date </b>' . $cdate . '</b><br>
  <button class="button"> ' . $sts . ' </button>
  </div>

  ';
        }









        //**********************************************



        ?>




    </div>

    </div>


    </div>

    <script src="./js/script.js"></script>
</body>

</html>