<?php

    session_start();
    $_SESSION['department'] = $_POST['department'];
    $_SESSION['employee'] = $_POST['employee'];
    $_SESSION['minage'] = $_POST['minage'];
    $_SESSION['maxage'] = $_POST['maxage'];
    header("Location:modal.php?page=search&numero=1&section=20");    

?>