<?php

    $emp_info = getEmployesInfo($_GET['emp_no']);
    $dept_2 = getHistory($_GET['emp_no']);

?>
<div class="container py-4 justify-content m-auto col-4 rounded-4">
    <h1 class="text-start text-black">Inforamtion Personnelle</h1>
    <hr class="m-5">
    <?php foreach ($emp_info as $value){?>
        <p>First Name : <?= $value['first_name'];?></p>
        <p>Last Name : <?= $value['last_name'];?></p>
        <p>Gender : <?= $value['gender'];?></p>
        <p>Birth : <?= $value['birth_date'];?></p>
    <?php } ?>

    <h1 class="text-start text-black">Inforamtion Professionnelle</h1>
    <hr class="m-5">
    <?php foreach ($emp_info as $value){?>
        <p>Num Employee : <?= $value['emp_no'];?></p>
        <p>Post Occupee : <?= $value['title'];?></p>
        <p>Departement : <?= $value['dept_name'];?></p>
        <p>Hire date : <?= $value['hire_date'];?></p>
        <p>Start of contract : <?= $value['from_date'];?></p>
        
    <?php } ?>

    <h1 class="text-start text-black">Historique de salaires</h1>
    <hr class="m-5">
    <table class = "col-12">
        <tr class= "bg-secondary ">
            <th>Salary</th>
            <th>From date</th>
            <th>To date</th>
        </tr>

        <?php foreach ($dept_2 as $value){?>
            <tr>
                <td><?= $value['salary'];?></td>
                <td><?= $value['sf_date'];?></td>
                <td><?= $value['s_date'];?></td>
            </tr>
        <?php } ?>

    </table>


</div>