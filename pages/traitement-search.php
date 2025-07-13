<?php

    session_start();
    include("../inc/function.php");
    $_SESSION['department'] = $_POST['department'];
    $_SESSION['employee'] = $_POST['employee'];
    $_SESSION['minage'] = $_POST['minage'];
    $_SESSION['maxage'] = $_POST['maxage'];
    $_SESSION['total'] = totalCount($_SESSION['department'], $_SESSION['employee'], $_SESSION['minage'], $_SESSION['maxage']);
    header("Location:modal.php?page=search&numero=1&section=20");    

?>