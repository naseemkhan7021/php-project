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

    <title>Searching | iForum</title>
</head>

<body>

    <?php require "partials/_header.php" ?>

    <div class="container">
        <h1 class="mt-3">Search for --> "<?php echo $_GET['search']?>"</h1>
        <!-- SELECT * FROM `thread` WHERE MATCH (`thread_title`,`thread_dsc`) against ('html') -->

        <!-- Your search - ajlfjlsdfjlsdjafjaslfjlajsdlkfjasdfsdfasfasd asdf dddddddddddddddddddddddddddddddddddd - did not match any documents.

    Suggestions:

    Make sure that all words are spelled correctly.
    Try different keywords.
    Try more general keywords.
    Try fewer keywords. -->
        <div class="results my-5">
            <?php
                $searchingfor = $_GET['search'];
                $noResult = true;
                // querry for searching two or more column text
                $sql = "SELECT * FROM `thread` WHERE MATCH (`thread_title`,`thread_dsc`) against ('$searchingfor')";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($result)){
                    echo '
                        <div class="result">
                            <h4> <a class="text-dark" href="threadlist.php?catid= '. $row['thread_id'] .'">'. $row['thread_title'] .'</a></h4>
                            <p>'. $row['thread_dsc'] .'</p>
                        </div>
                    ';
                    $noResult = false;
                };

                if ($noResult) {
                    # code...
                    echo '
                        <div class="bg-light p-5">
                        <h4 class="mt-3">Your search for --> "'. $_GET['search'] .'" - did not match any
            documents.</h4>

            <br>
            <strong>Suggestions:</strong>
            <ul>
                <li>Make sure that all words are spelled correctly.</li>
                <li>Try different keywords.</li>
                <li>Try more general keywords.</li>
                <li>Try fewer keywords.</li>
            </ul>
        </div>
        ';
        }

        ?>

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