<?php
error_reporting('not');
session_start();
/*
function logout(){
  session_start();
  session_unset();
  session_destroy();
  header("Location: /phpprojects/forum/index.php");
};
*/

echo '

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
      <a class="navbar-brand" href="index.php">iForum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Top Category
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            ';
            // catogary dropdown come frome dadabase
            $sqli = "SELECT `categories_id`, `categories_name` FROM `categories` LIMIT 5";
            $result = mysqli_query($conn,$sqli);
            while($row = mysqli_fetch_assoc($result)){
                $catId = $row['categories_id'];
                $HcatName = $row['categories_name'];
                echo '
                    <li><a class="dropdown-item" href="/phpprojects/forum/threadlist.php?catid='. $catId .'">'. $HcatName .'</a></li>
                    ';
            }
                  echo '</ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="contect.php">Contect</a>
                </li>
              </ul>
              <form action="search.php" method="get" class="d-flex">
                      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-success" type="submit">Search</button>
              </form>';
              // if user logdin than show name and logout else show login, singup button
              if (isset($_SESSION['logdin']) && $_SESSION['logdin']==TRUE) {
                # code...
                echo '
                      <p class="text-light mx-3 my-0"><b> Hello '. $_SESSION['username'] .'</b></p>
                      <a class="btn btn-outline-success " href="partials/_handelLogout.php" >Logout</a>
                  ';
              }else{
                echo '
                  
                  <!---remove below------>
                  <a class="btn btn-outline-success mx-2" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                        <a class="btn btn-outline-success " href="#" data-bs-toggle="modal" data-bs-target="#singupModal">Singup</a>
              ';
              }
             
          
        echo '</div>
            </div>
        </nav>
';

// show the massage loging or signup and what is error show to user
/**
 * hare i am complax the algorithm. hare is login and signup condison in one place
 * sorting the line of line code all algo base on website URL
 */
if (($_GET['signup'] && $_GET['signup'] == 'true') || ($_GET['login'] && $_GET['login'] == 'true')) {
  # code...
  echo '<div class="m-0 alert alert-success alert-dismissible fade show" role="alert">
  <strong>Succes!</strong>';
  // if user sigup
  if ($_GET['signup']) {
    # code...
    echo ' Go to login <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"> click me</a>';
  }
  // if user loging
  elseif ($_GET['login']) {
    # code...
    echo ' You are now login';
  }
  echo '!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
// error 
elseif (
  (($_GET['signup'] && $_GET['signup'] == 'false') || ($_GET['login'] && $_GET['login'] == 'false')) 
  && ($_GET['showError'] && $_GET['showError'] == 'true')) {
  # code...
  echo '
        <div class="m-0 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> '. $_GET['error'] .'!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  ';
}
include '_loginmodal.php';
include '_singupmodal.php';



?>