<?php

session_start();
session_unset();
session_destroy();
header("Location: /phpprojects/forum/index.php"); /// rediract to hompe page
// header("Location: /phpprojects/forum/index.php?login=true&showError=false");
?>