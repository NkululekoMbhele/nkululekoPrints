<?php

require_once("../session.php");

require_once("../class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id" => $user_id));

$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
$uid = $userRow['user_id'];
if (!$_SESSION['user_session']) {

	header("location: ../login/denied.php");
}

?>
<?php include '../includes/header.php'; ?>
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
#order-content {
    margin: 80px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    height: fit-content;
    flex-direction: column;
}

#order-content h2 {
    margin: 20px 0;
    color: #fff;
}

#order-content a {
    text-align: center;
    font-size: .8rem;
    padding: 5px 10px;
    width: 120px;
    background-color: #FFD200;
    border: none;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
}

#order-content a:hover {
    background-color: #CCD300;
}

table.altrowstable {
    border-width: 1px;
    border-color: #ddd;
    font-size: 14px;
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
</style>


</head>

<body>

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
                <li><a class="sign-up" href="../login/logout.php?logout=true">SIGN OUT</a></li>



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
                <a class="sign-up" href="../login/logout.php?logout=true">SIGN OUT</a>
            </div>
        </div>

    </nav>


    <div id="order-content">
        <a class="login-btn" href="../index.php">PLACE ORDER</a>
        <h2> [Order Detail] </h2>
        <table class="altrowstable" id="alternatecolor">
            <thead>
                <tr>
                    <th>Order <br> no.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Contact <br> Number </th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <?php
				require_once '../connection/dbconfig.php';

				$stmt = $db_con->prepare("SELECT * FROM ordrs WHERE uid = $uid ORDER BY myid DESC");
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
                <tr>
                    <td><?php echo $row['myid']; ?></td>

                    <td><img with="50" height="50" src="../<?php echo $row['img']; ?>"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['addr']; ?></td>
                    <td><?php echo $row['ordr']; ?></td>
                    <td><?php echo $row['cdate']; ?></td>
                    <td><?php echo $row['sts']; ?></td>


                </tr>
                <?php
				}
				?>

            </tbody>
        </table>

        <br>
        <?php



		?>

    </div>


    <?php include '../includes/footer.php'; ?>




    <script src="../js/script.js"></script>
</body>

</html>