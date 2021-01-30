<?php
require 'partials/_dbconnect.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Home | iForum</title>
</head>

<body>
    <!-- <h1>Welcome to iForum</h1> -->

    <?php require "partials/_header.php" ?>
    <!-- https://source.unsplash.com/1600x900/?nature,water -->

    <!-- hare is corasole  -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slider-1.jfif" class="d-block w-100" alt="img1">
                <!-- <img src="https://source.unsplash.com/1000x400/?software,programming" class="d-block w-100" alt="img1"> -->
            </div>
            <div class="carousel-item">
            <img src="img/slider-2.jfif" class="d-block w-100" alt="img1">
                <!-- <img src="https://source.unsplash.com/1000x400/?c++,c" class="d-block w-100" alt="img2"> -->
            </div>
            <div class="carousel-item">
                 <img src="img/last-s.jpg" class="d-block w-100" alt="img1">
                <!-- <img src="https://source.unsplash.com/1000x400/?html,javascript" class="d-block w-100" alt="img3"> -->
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <!-- hare is loop whise showing the all cetogry or post  -->

    <!-- INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_discription`, `created_at`) VALUES (NULL, 'python', 'hellow this is python programing languege. this language is most popular in the world. also this programing language primary need for programmers.\r\nalso my favorite programming language is python...!!!!', CURRENT_TIMESTAMP); -->
    <!-- all card hare  -->
    <div class="container">
        <div class="my-3">
            <h2 class="border-end-1 my-3">New | Posts</h2>
            <hr>
            <div class="row my-3 gy-5">

                <?php
                $sqli = "SELECT * FROM `categories`";
                $result = mysqli_query($conn,$sqli);
                while($row = mysqli_fetch_assoc($result)){
                    $catId = $row['categories_id'];
                    $catName = $row['categories_name'];
                    $catDiss = $row['categories_discription'];

                    echo '
                    <div class="col-md-4 col-sm-6">
                        <div class="card my-2 mx-auto" style="max-width: 20rem;">
                            <img src="https://source.unsplash.com/700x500/?'. $catName .',programming" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><a href="threadlist.php?catid='. $catId .'">'. $catName .'</a></h5>
                                <p class="card-text">'. substr($catDiss,0 , 94) .'...</p>
                                <a href="threadlist.php?catid='. $catId .'" class="btn btn-primary">View Threads</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
                
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card my-2 mx-auto" style="max-width: 20rem;">
                        <img src="img/card-1.jfif" class="card-img-top" alt="car1">
                        <!-- <img src="https://source.unsplash.com/700x500/?coding,programming" class="card-img-top" alt="car1"> -->
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                            <a href="threadlist.php" class="btn btn-primary">View Threads</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card my-2 mx-auto" style="max-width: 20rem;">
                        <img src="img/card-2.jfif" class="card-img-top" alt="...">
                        <!-- <img src="https://source.unsplash.com/700x500/?coding,apple" class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                            <a href="threadlist.php" class="btn btn-primary">View Threads</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require "partials/_footer.php" ?>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>