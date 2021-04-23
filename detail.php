<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Detail</title>

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

    <?php include 'includes/navbar.php' ?>
    <div id="main2">


        <div id="content">

            <?php
      require_once 'connection/dbconfig.php';

      //**********************************************
      $pid = $_GET['pid'];

      $stmt = $db_con->prepare("SELECT * FROM product WHERE pid = $pid");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);


      $img = $row['img'];
      $name =  $row['name'];
      $des = $row['des'];
      $pr = $row['pr'];
      $cdate =  $row['cdate'];


      echo '
  <div class="item1">

  <span><img src="' . $img . '"></span>

  </div>
  ';

      echo '
<div class="item1">
<button class="button2"> Price ' . $pr . '</button><br>
<h2>' . $name . '</h2>
<span><b>Description </b><br>' . $des . '<span><br><br>
<b><b>Publish Date </b>' . $cdate . '</b><br>
<button class="button2"> <a href="add-order.php?pid=' . $pid . '" > Order Now</a> </button>

</div>';
      //**********************************************

      ?>

        </div>

    </div>


    <?php include 'includes/footer.php' ?>
    <script src="./js/script.js"></script>

</body>

</html>