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
    <header>
        <nav class="bg-light p-2 navbar bg-body-tertiary">
            <a href="modal.php?page=liste" class="navbar-brand ">
                <h1>Indra</h1>
            </a>
            <button class="btn btn-gradient" data-bs-toggle="offcanvas" data-bs-target="#search">Search</button>
            <div class="offcanvas offcanvas-end" id="search">
                <div class="offcanvas-header">
                    <h1>SEARCH</h1>
                    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <hr>
                <div class="offcanvas-body">
                    <form action="traitement-search.php" role="search" class="" method="post">
                        <label for="department">Department Name</label>
                        <input type="search" name="department" id="department" placeholder="..." class="form-control mb-2">
                        <label for="employee">Employee Name</label>
                        <input type="search" name="employee" id="employee" placeholder="..." class="form-control mb-2">
                        <div class="d-flex justify-content-between">
                            <input type="number" name="minage" id="minage" min="0" max="200" class="col-5">
                            <input type="number" name="maxage" id="maxage" min="0" max="200" class="col-5">
                        </div>
                        <button class="btn btn-outline-success mt-3" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php 
            if($page != null) {
                include($page.".php"); 
            }
        ?>
    </main>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>