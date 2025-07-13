<?php

    
$dept = getNameToDepartments();


?>
<div class="container py-4 vh-100">
    <h1 class="text-center text-black m-5">Listes des Departements</h1>
    <table class="col-12">
        <tr>
            <th>Department Name</th>
            <th>Manager's Name</th>
            <th>Nombre d'employees</th>
        </tr>
        <?php 
        $i = 0;
        foreach($dept as $value) { 
            ?>
            <tr class="<?php echo $i % 2 == 0 ? 'odd' : 'inodd'; ?>">
                <td>
                    <a href="modal.php?page=fiche&dept_no=<?php echo $value['dept_no']; ?>" class="text-decoration-none fw-bold">
                        <?php echo $value['dept_name']; ?>
                    </a>
                </td>
                <td><?php echo $value['first_name']." ".$value['last_name']; ?></td>
                <td><?php echo $value['c_emp_dept'];?></td>
                </tr>
                
        <?php $i++; ?>
        <?php }?>
        
    </table>
    <a href="modal.php?page=fiche_hom_fem">Fiche hommes et femmes</a>
</div>