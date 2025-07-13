<?php

    $emp = getEmployes($_GET['dept_no']);

?>
<h1 class="text-center m-5">Listes des employees</h1>
<div class="container-fluid">

    <table class="col-8 m-auto">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php 
        $i = 0;
        foreach($emp as $value) { 
            ?>
            <tr class="m-5 p-5 <?php echo $i % 2 == 0 ? 'odd' : 'inodd'; ?>">  
            <td>
                <a href="modal.php?page=fiche_emp&emp_no=<?php echo $value['emp_no']; ?>" class="text-decoration-none text-black">
                        <?php echo $value['first_name']?>
                        
                </a>
            </td>
            <td>
                <a href="modal.php?page=fiche_emp&emp_no=<?php echo $value['emp_no']; ?>" class="text-decoration-none text-black">
                    <?php echo $value['last_name']; ?>        
                </a>
            </td>
            </tr>
        <?php $i++;
        } ?>
    </table>
</div>