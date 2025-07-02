<?php

    $numero = $_GET['numero'];
    $section = $_GET['section'];
    $pagination = getPagination($numero);
    $data = getListByCriteres($_SESSION['department'], $_SESSION['employee'], $_SESSION['minage'], $_SESSION['maxage'], $numero, $section);

?>

<div class="container">
    <div class="pagination mx-auto mb-3 col-6 d-flex justify-content-between">
        <a href="modal.php?page=search&numero=<?php echo $numero - 1; ?>&section=20">Previous</a>
        <?php for($i = 0; $i < count($pagination); $i++) {
            echo $pagination[$i][1] ? '<a href="modal.php?page=search&numero='.$pagination[$i][0].'&section='.$section.'">' : '';
            echo $pagination[$i][0];
            echo $pagination[$i][1] ? '</a>' : '';
         }?>
        <a href="modal.php?page=search&numero=<?php echo $numero + 1; ?>&section=20">Next</a>
    </div>
    <table class="col-12" border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Department</th>
            <th>Gender</th>
        </tr>
        <?php foreach($data as $value) { ?>
            <tr>
                <td><?php echo $value['first_name'] ?></td>
                <td><?php echo $value['last_name'] ?></td>
                <td><?php echo $value['birth_date'] ?></td>
                <td><?php echo $value['dept_name'] ?></td>
                <td><?php echo $value['gender'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>