<?php
require('api/ucenik.php');
$ucenici = getAllUcenici();
?>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Parents name</th>
            <th>Date of birth</th>
            <th>Razred</th>
            <th>Odjeljenje</th>
            <th>Printaj</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($ucenici) {
            foreach ($ucenici as $id => $ucenik) {
                $dateOfBirth = date('d/m/Y', strtotime($ucenik['dateOfBirth']));
                ?>
                <tr>
                    <td>
                        <?php echo $id + 1 ?>
                    </td>
                    <td>
                        <?php echo $ucenik['name'] ?>
                    </td>
                    <td>
                        <?php echo $ucenik['surname'] ?>
                    </td>
                    <td>
                        <?php echo $ucenik['parentsName'] ?>
                    </td>
                    <td>
                        <?php echo $dateOfBirth ?>
                    </td>
                    <td>
                        <?php echo $ucenik['razred'] ?>
                    </td>
                    <td>
                        <?php echo $ucenik['odjeljenje'] ?>
                    </td>
                    <td><button class="btn btn-light"><i class="fa fa-print"></i></button></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>