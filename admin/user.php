<?php

require_once("../session.php");

require_once("../class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id" => $user_id));

$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $userRow['user_id'];
if ($id == 1) {
} else {
	header("location: ../member/home.php");
}

if (!$_SESSION['user_session']) {

	header("location: ../login/denied.php");
}

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">

    <!-- Javascript goes in the document HEAD -->
    <script type="text/javascript">
    function altRows(id) {
        if (document.getElementsByTagName) {

            var table = document.getElementById(id);
            var rows = table.getElementsByTagName("tr");

            for (i = 0; i < rows.length; i++) {
                if (i % 2 == 0) {
                    rows[i].className = "evenrowcolor";
                } else {
                    rows[i].className = "oddrowcolor";
                }
            }
        }
    }
    window.onload = function() {
        altRows('alternatecolor');
    }
    </script>

    <!-- CSS goes in the document HEAD or added to your external stylesheet -->
    <style type="text/css">
    table.altrowstable {
        border-width: 1px;
        border-color: #ddd;
        border-collapse: collapse;
    }

    table.altrowstable th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #ddd;
    }

    table.altrowstable td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #ddd;
    }

    .oddrowcolor {
        background-color: #fcfcfc;
    }

    .evenrowcolor {
        background-color: #e0dbdb;
    }

    ul.pagination {
        text-align: center;
        color: #1f447f;
    }

    ul.pagination li {
        display: inline;
        padding: 0 3px;
    }

    ul.pagination a {
        color: #1f447f;
        display: inline-block;
        padding: 5px 10px;
        border: 1px solid #1f447f;
        text-decoration: none;
    }

    ul.pagination a:hover,
    ul.pagination a.current {
        background: #1f447f;
        color: #fff;
    }
    </style>

    <!-- Table goes in the document BODY -->



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
                    <li><a href="admin.php">HOME</a></li>
                    <li><a href="user.php">USER</a></li>
                    <li><a href="product.php">PRODUCT</a></li>
                    <li><a href="order.php">ORDER</a></li>
                    <li><a href="message.php">Messages</a></li>
                    <li><a href="../login/logout.php?logout=true">SIGN OUT</a></li>



                </ul>
            </div>
            <div class="menuIcon">
                <span class="icon icon-bars"></span>
                <span class="icon icon-bars overlay"></span>
            </div>


            <div class="overlay-menu">

                <div class="list">
                    <a href="admin.php">HOME</a>
                    <a href="user.php">USER</a>
                    <a href="product.php">PRODUCT</a>
                    <a href="order.php">ORDER</a>
                    <a href="message.php">MESSAGES</a>
                    <a href="../login/logout.php?logout=true">SIGN OUT</a>
                </div>
            </div>

        </nav>
    </header>
    <div id="content">
        <h2><a class="button" href="../login/admin-add.php"> Add User</a> Admin Access Only [User Page] </h2>

        <center>


            <table class="altrowstable" id="alternatecolor">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					require_once '../connection/dbconfig.php';

					include_once('../connection/connectionz.php');
					include_once('../function/functionz.php');

					$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
					if ($page <= 0) $page = 1;

					$per_page = 5; // Set how many records do you want to display per page.

					$startpoint = ($page * $per_page) - $per_page;

					$statement = "`users` ORDER BY `user_id` ASC"; // Change `records` according to your table name.

					$results = mysqli_query($conDB, "SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

					if (mysqli_num_rows($results) != 0) {

						// displaying records.
						while ($row = mysqli_fetch_array($results)) {

					?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>

                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo "Member only"; ?></td>
                        <td><?php echo $row['joining_date']; ?></td>

                        <td align="center">
                            <a href="uedit.php?uid=<?php echo $row['user_id']; ?>" title="Edit">
                                <img src="../img/edit.png" width="20px" />
                            </a>
                        </td>
                        <td align="center"><a href="delete.php?uid=<?php echo $row['user_id']; ?>" title="Delete">
                                <img src="../img/delete.png" width="20px" />
                            </a></td>
                    </tr>

                    <?php

						}
						?>

                </tbody>
            </table>
            <br>

            <?php

					} else {

						echo "No recond here";
					}


					// displaying paginaiton.
					echo pagination($statement, $per_page, $page, $url = '?');
		?>
        </center>

    </div>



    </div>


    <script src="../js/script.js"></script>
</body>

</html>