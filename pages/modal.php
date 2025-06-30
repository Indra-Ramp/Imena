<?php

    include("../inc/function.php");
    session_start();
    $page = isset($_GET['page']) ? $_GET['page'] : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php 
        if($page != null) {
            include($page.".php"); 
        }
    ?>
</body>
</html>