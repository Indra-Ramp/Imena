<?php

    $groupEmploi = groupEmploi();

?>

<div class="container py-4 vh-100">
    <table class= "col-6 m-auto">
        <tr>
            <th>Nombre d'hommes</th>
            <th>Nombre de femmes</th>
            <th>Emplois</th>
        </tr>
        <?php foreach ($groupEmploi as $value){?>
        <tr class="m-5 p-5 <?php echo $i % 2 == 0 ? 'odd' : 'inodd'; ?>">  
            <td><?php echo $value['c_female'];?></td>
            <td><?php echo $value['c_female'];?></td>
            <td><?php echo $value['title'];?></td>
    <?php $i++;?>
    <?php }?>
    </table>
</div>