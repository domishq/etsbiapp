<?php
require('api/ucenik.php');
require('api/uvjerenje.php');
$ucenici = getAllUcenici();
$svrhe = getAllUvjerenjaSvrhe();
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
                <tr class="clickable-row" data-href="editUcenik.php?id=<?php echo $ucenik['id']; ?>"
                    data-ucenikId="<?php echo $ucenik['id']; ?>">
                    <td><?php echo $id + 1 ?></td>
                    <td><?php echo $ucenik['surname'] . ', ' . $ucenik['name'] ?></td>
                    <td><?php echo $ucenik['parentsName'] ?></td>
                    <td><?php echo $dateOfBirth ?></td>
                    <td><?php echo $ucenik['razred'] ?></td>
                    <td><?php echo $ucenik['odjeljenje'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary open-modal" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fa fa-print"></i>
                        </button>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Izaberite razloge</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="razloziForm">
                    <?php foreach ($svrhe as $svrha): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?php echo $svrha['id']; ?>"
                                id="svrha<?php echo $svrha['id']; ?>">
                            <label class="form-check-label" for="svrha<?php echo $svrha['id']; ?>">
                                <?php echo $svrha['name']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                <button type="button" class="btn btn-primary" id="saveButton">Dalje</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // When a row is clicked, navigate to the edit page
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });

        // Prevent the row click event when clicking on the button
        $(".btn").click(function (event) {
            event.stopPropagation();
        });

        // Handle when the modal is opened
        var selectedUcenikId = null;
        $(".open-modal").click(function (event) {
            event.stopPropagation();
            selectedUcenikId = $(this).closest("tr").data("ucenikid");

            // Reset all checkboxes when modal is opened
            $("#razloziForm input:checkbox").prop("checked", false);
        });

        // Handle Save button click inside the modal
        $("#saveButton").click(function () {
            if (selectedUcenikId) {
                // Collect selected checkboxes
                var selectedRazlozi = [];
                $("#razloziForm input:checkbox:checked").each(function () {
                    selectedRazlozi.push($(this).val());
                });

                if (selectedRazlozi.length === 0) {
                    // Show confirmation if no checkboxes are selected
                    if (confirm("Niste izabrali niti jednu svrhu zahtjeva. Jeste li sigurni da želite nastaviti?")) {
                        // If confirmed, continue to the print page without reasons
                        window.location.href = 'printaj.php?ucenikId=' + selectedUcenikId;
                    }
                } else {
                    // Redirect to print page with selected reasons
                    window.location.href = 'printaj.php?ucenikId=' + selectedUcenikId + '&svrhe=' + selectedRazlozi.join(',');
                }
            }
        });

        $('#myTable').DataTable();
    });
</script>