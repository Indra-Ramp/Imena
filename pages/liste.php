<?php

    
$dept = getNameToDepartments();

?>
<div class="container py-4 vh-100">
    <table class="col-12">
        <tr>
            <th>Department Name</th>
            <th>Manager's Name</th>
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
            </tr>
        <?php $i++;
        } ?>
    </table>
</div>