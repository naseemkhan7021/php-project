<?php
    require 'partials/_dbconnect.php';
    $showAllert = false;
    $Catogary_id = $_GET['catid'];
    $sqli = "SELECT * FROM `categories` WHERE `categories_id`=$Catogary_id";
    $result = mysqli_query($conn,$sqli);
    while($row = mysqli_fetch_assoc($result)){
        // $catId = $row['categories_id'];
        $catName = $row['categories_name'];
        $catDiss = $row['categories_discription'];
    }
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

    <title><?php echo $catName;?> Thread List | iForum</title>
</head>

<body>
    <!-- <h1>Welcome to iForum</h1> -->
    
    <?php require "partials/_header.php" ?> <!--- this is header element come from another file---->

    <!-- hare is new thread post areay  -->
    <?php
        // echo $_SERVER['REQUEST_METHOD'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            // below line is for handeling xss atack (script atack. handel web scripting sentax on web)
            $title = str_replace('>','&gt;',$title);
            $title = str_replace('<','&lt;',$title);
            $description = $_POST['desc'];
            $description = str_replace('>','&gt;',$description);
            $description = str_replace('<','&lt;',$description);
            $userid = $_SESSION['userid'];
            // insert into dadabase query 
           $sql = "INSERT INTO `thread` (`thread_title`, `thread_dsc`, `thread_cat_id`, `thread_user_id`, `timestape`) VALUES ('$title', '$description', '$Catogary_id', '$userid', CURRENT_TIMESTAMP)";
           $result = mysqli_query($conn,$sql);
           if ($result) {
               # code...
               $showAllert = true;
           }

        };
    ?>

    <?php
        if ($showAllert) {
            # code...
            echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Succes!</strong> Your thread added sucessfully!!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            ';
        }
    ?>


    <!-- hare is man notice or rolls of this site  -->
    <div class="container">
        <div class="bg-light p-4 my-3">
            <h1>Welcome to <?php echo $catName ;?> forums</h1>
            <p>
                <?php
                    echo $catDiss;
                ?></p>
            <hr>

            <h6>No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Do not PM users asking for help.
                Remain respectful of other members at all times.</h6>

            <button class="btn btn-success my-1">Learn more</button>
        </div>
        <hr class="my-4">
    </div>

    <!--  post Quetions form -->
    <?php
    if (isset($_SESSION['logdin']) && $_SESSION['logdin']==TRUE){
        echo '
            <div class="container">
            <h4>Ask Quetions</h4>
                <form class="border p-4 rounded" action="'. $_SERVER['REQUEST_URI'] .'" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Hare is Title</label>
                        <input required type="text" class="form-control" name="title" id="title" placeholder="new problem">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Problem in detail</label>
                        <textarea required class="form-control" name="desc" id="desc" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn ms-2 btn-dark">Reset</button>
                </form>
                <hr class="my-4">
            </div>
        ';
    }else{
        echo '
        <div class="container">
            <h4>Ask Quetions</h4>
            <div class="alert alert-warning" role="alert">
                <p class="lead m-0">
                   <b>You are not login user. Pleas loging to post your Quetions.!!</b>
                </p>
            </div>
            <hr class="my-4">
        </div>
        ';
    }
    
    
    ?>
    

    <!-- hare is problem list  -->
    <!-- fetching the list of problem from the dabase by php script -->
    <div class="container">
        <h3 class="my-3">Browse Questions</h3>
        <?php
            $sqli = "SELECT * FROM `thread` WHERE `thread_cat_id`=$Catogary_id";
            $result = mysqli_query($conn,$sqli);
            $nothread = true;
            while($row = mysqli_fetch_assoc($result)){
                $nothread = false;
                // $catId = $row['categories_id'];
                $title = $row['thread_title'];
                $discription = $row['thread_dsc'];
                $user_id = $row['thread_user_id'];
                $thread_id = $row['thread_id'];
                // find the user detail base on it user id
                $sqli2 = "SELECT * FROM `users` WHERE `user_id` = $user_id";
                $result2 = mysqli_query($conn,$sqli2);
                $row2 = mysqli_fetch_assoc($result2);
                $posted_userName = $row2['user_name'];

                echo '
                <div class="row my-4">
                    <div class="col-1 text-center">
                        <img src="img/userdefault.png" class="rounded" alt="userimg" width="54px">
                    </div>
                    <div class="col-11 textc">
                        <h6>
                            <a class="text-dark text-decoration-none" href="thread.php?threadid='. $thread_id .'">'. $title .'</a>
                        </h6>
                        <p class="m-0">
                        '. substr($discription,0,50).'... 
                            <a 
                            style="
                            
                            color: #9e9c9c; " 
                            href="thread.php?threadid='. $thread_id .'">
                                read more
                            </a>
                        </p>
                        <small>by - <strong style="font-weight: 700;"><b>'. $posted_userName .'</b> </strong> | '. $row['timestape'] .'</small>
                    </div>
                </div>
                ';

            }
            if ($nothread) {
                # code...
                echo '
                    <div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading display-4">No Thread found</h4>
                        <p>There is no thread found becouse of no any one take problem. Make your problem first</p>
                        <hr>
                        <p class="mb-0">Post the thread under the rool of this forum.</p>
                    </div>
                ';
            }

        ?>
        <hr class="my-4">

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