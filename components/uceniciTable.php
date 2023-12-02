<?php
    require('api/database.php');
    require('api/ucenik.php');
    $ucenici = getAllUcenici($conn);
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
        </tr>
    </thead>
    <tbody>
        <?php
        if($ucenici)
        {
            foreach($ucenici as $id => $ucenik){
                $dateOfBirth = date('d/m/Y', strtotime($ucenik['dateOfBirth']));
                echo "<tr>";
                echo "<td>" . $id+1 . "</td>";
                echo "<td>" . $ucenik['name'] . "</td>";
                echo "<td>" . $ucenik['surname'] . "</td>";
                echo "<td>" . $ucenik['parentsName'] . "</td>";
                echo "<td>" . $dateOfBirth . "</td>";
                echo "<td>" . $ucenik['razred'] . "</td>";
                echo "<td>" . $ucenik['odjeljenje'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>