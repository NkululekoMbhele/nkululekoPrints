<?php include 'includes/header.php'; ?>




<body>


    <?php include 'includes/navbar.php'; ?>

    <div class="cat-pages">
        <button class="nav-btn page-active">STOCK POSTERS</button>
        <button class="nav-btn ">Artwork</button>
        <button class="nav-btn ">Custom Prints</button>
    </div>
    <div id="posters-cont">

        <?php include 'includes/posters.php'; ?>
    </div>
    <div id="artwork-cont">

        <?php include 'includes/artwork.php'; ?>
    </div>
    <div id="custom-cont">

        <?php include 'includes/custom.php'; ?>
    </div>








    <?php include 'includes/footer.php'; ?>
    </div>

    <script>
    const activeElement = document.querySelector(".link-home");
    activeElement.style.color = "#124f9e";
    activeElement.style.cursor = "none";
    activeElement.classList.add("disable");
    </script>
    <script src="./js/script.js"></script>
</body>

</html>