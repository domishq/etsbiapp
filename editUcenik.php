<?php require_once('includes/php/head.php'); ?>
<?php require_once('components/sidebar.php'); ?>

<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 11;">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto" style="color:green;">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="color:green;">
            Ucenik updated successfully!
        </div>
    </div>
</div>

<section class="my-5">
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1>Edit Ucenik</h1>
            </div>
        </div>
        <hr class="mb-5 mt-2">
        <div class="row">
            <div class="col-5 m-auto">
                <form class="editUcenikForm" id="editUcenikForm" action="api/ucenik.php?action=editUcenik" method="post">
                    <input type="hidden" name="ucenikId" id="ucenikId" value="<?php echo $_GET['id'] ;?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="mb-3">
                        <label for="parentsName" class="form-label">Parents Name</label>
                        <input type="text" class="form-control" id="parentsName" name="parentsName">
                    </div>
                    <!-- Other fields related to Ucenik -->
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="ucenici.php"><button class="btn btn-secondary me-1">Cancel</button></a>
                <button type="submit" id="saveButton" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</section>

<!-- JS -->
<script>
    $(document).ready(function() {
        var ucenikId = $('#ucenikId').val();
        $.ajax({
            url: 'api/ucenik.php?action=getUcenikById&ucenikId=' + ucenikId,
            method: 'GET',
            success: function(response) {
                var ucenik = JSON.parse(response);
                $('#name').val(ucenik.name);
                $('#surname').val(ucenik.surname);
                $('#parentsName').val(ucenik.parentsName);
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });

        $('#saveButton').click(function(e) {
            e.preventDefault();
            var ucenikId = $('#ucenikId').val();
            var name = $('#name').val();
            var surname = $('#surname').val();
            var parentsName = $('#parentsName').val();

            $.ajax({
                url: 'api/ucenik.php?action=updateUcenik',
                method: 'POST',
                data: {
                    ucenikId: ucenikId,
                    name: name,
                    surname: surname,
                    parentsName: parentsName
                },
                success: function(response) {
                    var myToastEl = document.getElementById('liveToast');
                    var bsToast = new bootstrap.Toast(myToastEl);
                    bsToast.show();
                    console.log('success');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
        });
    });
</script>

<?php require_once('includes/php/foot.php'); ?>
