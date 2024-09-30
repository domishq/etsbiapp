<?php
require('api/ucenik.php');
$ucenici = getAllUcenici();
?>

<table id="myTable" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ucenik</th>
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
                <tr class="clickable-row" data-href="editUcenik.php?id=<?php echo $ucenik['id']; ?>">
                    <td><?php echo $id + 1 ?></td>
                    <td><?php echo $ucenik['surname'] . ', ' . $ucenik['name'] ?></td>
                    <td><?php echo $ucenik['parentsName'] ?></td>
                    <td><?php echo $dateOfBirth ?></td>
                    <td><?php echo $ucenik['razred'] ?></td>
                    <td><?php echo $ucenik['odjeljenje'] ?></td>
                    <td><a href="printaj.php?ucenikId=<?php echo $ucenik['id'] ?>"><button class="btn btn-light"><i class="fa fa-print"></i></button></a></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });

        $('#myTable').DataTable();
    });
</script>
