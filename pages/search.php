<?php

    $numero = $_GET['numero'];
    $section = $_GET['section'];
    $nbPage = $_SESSION['total'] / $section > intdiv($_SESSION['total'], $section) ? intdiv($_SESSION['total'], $section) + 1 : intdiv($_SESSION['total'], $section); 
    $pagination = getPagination($numero, $_SESSION['total'], $section);
    $data = getListByCriteres($_SESSION['department'], $_SESSION['employee'], $_SESSION['minage'], $_SESSION['maxage'], $numero, $section);

?>

<div class="container">
    <div class="pagination mx-auto mb-3 col-6 d-flex align-items-center justify-content-between">
        <a class="" <?php echo $numero > 1 ? 'href="modal.php?page=search&numero='.($numero - 1).'&section=20"' : ''?>>
            <button class="btn btn-<?php echo $numero <= 1 ? 'secondary' : 'success'?>" <?php echo $numero <= 1 ? "disabled" : ''; ?>>Previous</button>
        </a>
        <?php for($i = 0; $i < count($pagination); $i++) {
            $string = $pagination[$i][0] == $numero ? 'bg-success py-2 px-3 text-decoration-none rounded text-light' : '';
            echo $pagination[$i][1] ? '<a class="'.$string.'" href="modal.php?page=search&numero='.$pagination[$i][0].'&section='.$section.'">' : '';
            echo $pagination[$i][0];
            echo $pagination[$i][1] ? '</a>' : '';
         }?>
        <a class="" <?php echo $numero < $nbPage ? 'href="modal.php?page=search&numero='.($numero + 1).'&section=20"' : ''?>>
            <button class="btn btn-<?php echo $numero >= $nbPage ? 'secondary' : 'success'?>" <?php echo $numero >= $nbPage ? "disabled" : ''; ?>>Next</button>
        </a>
    </div>
    <table class="col-12" border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Department</th>
            <th>Gender</th>
            <th>Department Status</th>
        </tr>
        <?php foreach($data as $value) { ?>
            <tr>
                <td><?php echo $value['first_name'] ?></td>
                <td><?php echo $value['last_name'] ?></td>
                <td><?php echo $value['birth_date'] ?></td>
                <td><?php echo $value['dept_name'] ?></td>
                <td><?php echo $value['gender'] ?></td>
                <td><?php echo $value['dept_stat'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>