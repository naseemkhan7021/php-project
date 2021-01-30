<?php
// for show the massage to user
$error= 'false';
$showAllert = 'false';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    require "_dbconnect.php";
    # code...
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $existssqli = "SELECT * FROM `users` WHERE `user_email`='$email'";
    $result = mysqli_query($conn,$existssqli);
    $numRow = mysqli_num_rows($result);
    // $numofRow = mysqli_num_rows($result);
    // echo $numRow;
    // echo '<br>';
    if ($numRow<1) {
        # code...
        $showAllert ='true';
        $error = 'Email is not exists';
        // echo 'email is not exists';
    }else{
        $row = mysqli_fetch_assoc($result);
        // echo $row['user_pass'];
        // echo '<br>';
        $verifyPass = password_verify($pass,$row['user_pass']);
        // echo var_dump($verifyPass);
        if (!$verifyPass) {
            # code...
            $showAllert = 'true';
            $error = 'Email and Password do not match !!';
            
        }else{
            session_start();
            $_SESSION['logdin'] = TRUE;
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['useremail'] = $row['user_email'];
            $_SESSION['userpass'] = $row['user_pass'];
            $_SESSION['userid'] = $row['user_id'];
            header("Location: /phpprojects/forum/index.php?login=true&showError=false");
            exit();
        }
    }
    header("Location: /phpprojects/forum/index.php?login=false&showError=true&error=$error");
}


?>