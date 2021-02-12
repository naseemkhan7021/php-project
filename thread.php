<?php
    require 'partials/_dbconnect.php';
    include 'partials/_controlFunctions.php';
    session_start();
    $responce='';

    $showAllert = false;
    $thread_id = $_GET['threadid'];
    $sqli = "SELECT * FROM `thread` WHERE `thread_id`=$thread_id";
    $result = mysqli_query($conn,$sqli);
    while($row = mysqli_fetch_assoc($result)){
        // $threadid = $row['categories_id'];
        
        $title = $row['thread_title'];
        $desc = $row['thread_dsc'];
        $postDate = $row['timestape'];
        $threader_id = $row['thread_user_id'];
        // find the user detail base on it user id
        $sqli2 = "SELECT * FROM `users` WHERE `user_id` = $threader_id";
        $result2 = mysqli_query($conn,$sqli2);
        $row2 = mysqli_fetch_assoc($result2);
        $threader_name = $row2['user_name'];    
    }

?>


<!-- hare is new comment and replay areay  -->
<?php
    // echo $_SERVER['REQUEST_METHOD'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // echo 'hello';
        if (isset($_POST['replay'])) {
            // stor replay data on db 
            # code...
            $replayText = $_POST['replay'];
            $replayText = str_replace('>','&gt;',$replayText);
            $replayText = str_replace('<','&lt;',$replayText);
            $replayText = mysqli_escape_string($conn,$replayText);
            $replayText = ucfirst($replayText);
            $userid = $_SESSION['userid'];
            $parant_id = $_POST['parentComment'];
            // echo $parant_id . '<br>';
            // $checkingQuery = "SELECT * FROM `replay` WHERE "
        
            // insert into dadabase query 
            $sql = "INSERT INTO `replay` (`content`, `user_id`, `parant_id`, `date`) VALUES ('$replayText','$userid', '$parant_id', CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn,$sql);
            // $result = $conn->query($sql);
            // echo var_dump($result);
            if ($result) {
                # code...
                $showAllert = true;
            }
            else 
                echo 'error is --> '. mysqli_error($conn);
        }else{
            // store comments data on db 
            $comment = $_POST['comment'];
            $comment = str_replace('>','&gt;',$comment);
            $comment = str_replace('<','&lt;',$comment);
            // echo $comment;
            $comment = mysqli_escape_string($conn,$comment);
            $comment = ucfirst($comment);
            // echo $_SESSION['userid'];
            $userid = $_SESSION['userid'];
            
            // insert into dadabase query 
            $sql = "INSERT INTO `comments` (`content`, `user_id`, `parant_id`, `date`) VALUES ('$comment', '$userid', '$thread_id', CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                # code...
                $showAllert = true;
            }
            // else{
            //     echo ' not insert data error is-> ' . mysqli_error($conn);
            // }
        }
    };
    
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

    <title>Thread | iForum</title>
</head>

<body>
    <!-- <h1>Welcome to iForum</h1> -->

    <!--- this is header element come from another file---->
    <?php require "partials/_header.php" ?>

    <!-- show allert if there is comments posted -->
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


    <!-- Hare is all Quesion show   -->
    <div class="container">
        <div class="bg-light p-4 my-3">
            <h1><?php echo $title ;?></h1>
            <p>
                <?php
                    echo $desc;
                ?></p>
            <hr>

            <p>Posted by - <strong><?php echo $threader_name .' |  '.dateFormet($postDate);?></strong></p>

            <button class="btn btn-success my-1">Learn more</button>
        </div>
        <hr class='my-4'>
    </div>
    <!-- Hare is user post his Comments, this is form for posting the comments -->
    <?php
    // echo replayTeplat('hellow i am function');
    if (isset($_SESSION['logdin']) && $_SESSION['logdin']==TRUE){
        echo '
            <div class="container">
                <h3>Start Discussion</h3>
                <form class="border p-4 rounded" action="'. $_SERVER['REQUEST_URI'] .'" method="post">
                    <div class="mb-3">
                        <label for="comment" class="form-label">comment somthing</label>
                        <textarea required class="form-control" name="comment" placeholder="comment" id="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn ms-2 btn-dark">Reset</button>
                </form>
            </div>
        ';
        
    }else{
        echo '
        <div class="container">
       
            <h3>Start Discussion</h3>
            <div class="alert alert-warning" role="alert">
                <p class="lead m-0">
                <b>You are not login user. Pleas loging to post your Comments.!!</b>
                </p>
            </div>
        </div>
        ';
    }
    
    ?>


    <!-- hare is comments list  -->
    <!-- fetching comments from the data base if hare is not data show the 'no comment' notifications -->
    <div class="container">
        <hr class="my-4">
        <h3 class="my-3">All Discussion</h3>
        <?php
        //  $responce .= replayTeplat(array('waseem','12-12-2020','this is comment'));
            // $sqli = "SELECT * FROM `comments` WHERE `parant_id`=$thread_id";
            $sqli = "SELECT `user_name`, `content`, `comments`.`id`, `comments`.`date` FROM `comments`INNER JOIN `users` ON `comments`.`user_id` = `users`.`user_id` WHERE `parant_id`=$thread_id";
            $result = mysqli_query($conn,$sqli);
            $nothread = true;
            $index = 0;
            while($data = mysqli_fetch_assoc($result)){
                $nothread = false;
                // echo var_dump($data);
                // echo $data['id'] .'<--- id';
                $responce .= commentAndReplayTeplat($data);
            };
            // echo var_dump($responce);
            echo $responce;
            if ($nothread) {
                # code...
                echo '
                    <div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading display-4">No comment hare</h4>
                        <p>There is no comments at. make your comments first.</p>
                        <hr>
                        <p class="mb-0">Post the comment under the rool of this forum.</p>
                    </div>
                ';
            }


           

        ?>




        <hr class="my-4">
        <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
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
    <script src="index.js"></script>

</body>

</html>