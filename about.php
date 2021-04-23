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

</head>

<body>
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <div class="about" id="about">
            <h1>About</h1>
            <div class="about-me-info">
                <p>My name is Nkululeko Mbhele, I am a UCT student, living at Obz Square residence. I am currently
                    pursuing a Bsc Computer Science degree, it is my third year this year. I have learned
                    most of the key programming concepts in this degree.</p>
                <p>Over the past few years, I have developed an interest in designing, 3d modeling, web development,
                    photography, and programming. I took a step to learn these interest and now I know the basics of
                    these skills that were my interest.</p>
                <p>In this site I sell posters for decorating rooms, the perfect target market for my service is people
                    who live around mostly students. I have created this site as tool of both developing my skills and
                    also to make some money that I will
                    use to do big projects</p>
                <p>In this site I sell posters for decorating rooms, the perfect target market for my service is people
                    who live around mostly students. I have created this site as tool of both developing my skills and
                    also to make some money that I will
                    use to do big projects</p>
                <p>In this site I sell posters for decorating rooms, the perfect target market for my service is people
                    who live around mostly students. I have created this site as tool of both developing my skills and
                    also to make some money that I will
                    use to do big projects</p>
            </div>

        </div>
    </div>

    <?php include 'includes/footer.php'; ?>


    <script>
    const activeElement = document.querySelector(".link-about");
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

</html>