<?php
error_reporting('not');
// $showAllert="false";
$error = "false";
$showError = 'false';
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    require "_dbconnect.php";
    # code...
    // INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `date`) VALUES (NULL, 'secund user', 'secunduser@gmail.com', '123', CURRENT_TIMESTAMP)
    // echo 'singup file';
    $name = $_POST['name'];
    // below line is for handeling xss atack (script atack. handel web scripting sentax on web)
    $name = str_replace('>','&gt;',$name);
    $name = str_replace('<','&lt;',$name);
    $email = $_POST['email'];
    // below line is for handeling xss atack (script atack. handel web scripting sentax on web)
    $email = str_replace('>','&gt;',$email);
    $email = str_replace('<','&lt;',$email);
    $pass = $_POST['password'];
    // below line is for handeling xss atack (script atack. handel web scripting sentax on web)
    $pass = str_replace('>','&gt;',$pass);
    $pass = str_replace('<','&lt;',$pass);
    $cpass = $_POST['cPassword'];

    $existSql = "SELECT * FROM `users` WHERE `user_email`='$email'";
    $result = mysqli_query($conn,$existSql);
    $numofRow = mysqli_num_rows($result);
    echo $numofRow;
    // exit();
    if ($numofRow>0) {
        # code...
            $error = 'email is already exists!!';
        
    }else{
        if ($pass == $cpass) {
            # code...
            $hashpass = password_hash($pass,PASSWORD_DEFAULT);
            // echo $hashpass;
            // exit();
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `date`) VALUES ('$name', '$email', '$hashpass', CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn,$sql);
            $showError = 'false';
            header("Location: /phpprojects/forum/index.php?signup=true&showError=false");
            exit();
        }else{
            $error = 'password do not match!!';
        }
    }
    header("Location: /phpprojects/forum/index.php?signup=false&showError=true&error=$error");
};



?>