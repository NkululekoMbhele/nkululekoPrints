<style>
.page_info {
    margin-bottom: 10px;
    color: #FFD200;
}

ul.pagination {
    margin-top: 50px;
    margin-bottom: 20px;
    text-align: center;
    color: #FFD200;
}

ul.pagination li {
    display: inline;
    padding: 0 3px;
}

ul.pagination a {
    color: #fff;
    display: inline-block;
    padding: 5px 10px;
    border-radius: 6px;
    border: 1px solid #000814;
    text-decoration: none;
}

ul.pagination a:hover,
ul.pagination a.current {
    background: #FFD200;
    color: #fff;
}
</style>


<div class="posters">
    <div class="title">
        <h1>Posters</h1>
    </div>
    <div class="descr">
        <h3></h3>
    </div>
    <div class="container-group">
        <div id="poster-display">

            <?php
            require_once 'connection/dbconfig.php';

            include_once('connection/connectionz.php');
            include_once('function/functionz.php');

            $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
            if ($page <= 0) $page = 1;

            $per_page = 12; // Set how many records do you want to display per page.

            $startpoint = ($page * $per_page) - $per_page;

            $statement = "`product` ORDER BY `pid` ASC";


            //**********************************************
            $stmt = $db_con->prepare("SELECT * FROM product ORDER BY pid DESC  LIMIT {$startpoint} , {$per_page} ");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $img = $row['img'];
                $pid = $row['pid'];
                $pr = $row['pr'];

                echo '
        <div class="item">
        <img src="' . $img . '">
       <a class="order" href="add-order.php?pid=' . $pid . '" >Order Now</a>
        </div>';
            } // While loop End
            //**********************************************
            ?>






        </div>
        <div id="navigation">
            <br>

            <?php

            // displaying paginaiton.
            echo pagination($statement, $per_page, $page, $url = '?');
            ?>
            <br>

        </div>
    </div>

</div>