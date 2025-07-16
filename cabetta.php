<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang FishNest</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="./thichi.js"></script>
    <link rel="stylesheet" href="./thichi.css">
</head>

<body>

    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./trangchu.php">Thế giới Cá BETTA</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./trangchu.php">TRANG CHỦ</a><
                    </ul>
                </div>
            </div>
        </nav>


        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="margin: 49px 0px;">
                <div class="item active">
                    <img src="./hinhanh/cá đổi 1.jpg" alt="New York" class="carousel-img">


                </div>

                <div class="item">
                    <img src="./hinhanh/cá đổi 2.jpg" alt="Chicago" class="carousel-img">

                </div>

                <div class="item">
                    <img src="./hinhanh/cá đổi 3.jpg" alt="Los Angeles" class="carousel-img">

                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- container-->
        <h1 id="betta-title" class="rainbow-title">Chào mừng Bạn Đến với Cá Betta</h1>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'tonghop');
       $result = $conn->query("SELECT * FROM cacloaica WHERE id BETWEEN 1 AND 12");


        $count = 0;
        echo "<table class='table-products'>";
        while ($row = $result->fetch_assoc()) {
            if ($count % 3 == 0) echo "<tr>";
            echo "<td>
            <img src='hinhanh/{$row['image_url']}' class='product-img'><br>
            <strong class='product-name'>{$row['description']}</strong><br>
            <span class='product-price'>Giá: {$row['price']} VND</span><br>
            <a href='add_cart.php?id={$row['id']}' class='buy-button'>Mua 🛒</a>
            </td>";
            if ($count % 3 == 2) echo "</tr>";
            $count++;
        }
        echo "</table>";
        ?>


        <!-- Footer -->
        <footer class="text-center">
            <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a><br><br>
            <p>Bootstrap Theme Made By <a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">www.w3schools.com</a></p>
        </footer>

    </body>

</html>