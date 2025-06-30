<?php

    $emp = getEmployes($_GET['dept_no']);

?>

<div class="container-fluid">
    <ul>
        <?php foreach($emp as $value) { ?>
            <li>
                <a href="modal.php?page=fiche_emp&emp_no=<?php echo $value['emp_no']; ?>">
                    <?php echo $value['first_name']." ".$value['last_name']; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>