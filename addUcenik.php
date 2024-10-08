<?php 
    require_once('includes/php/head.php'); 
    require_once('components/sidebar.php');
?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1>Dodaj ucenika</h1>
        </div>
    </div>
    <hr class="mb-5 mt-2">
    <div class="row">
        <div class="col-12">
            <div class="col-5">
                <form action="api/ucenik.php?action=createUcenik" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="mb-3">
                        <label for="parentsName" class="form-label">Parents name</label>
                        <input type="text" class="form-control" id="parentsName" name="parentsName">
                    </div>
                    <div class="mb-3">
                        <label for="dateOfBirth" class="form-label">Datum rodjenja</label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth">
                    </div>
                    <div class="mb-3">
                        <label for="razred" class="form-label">Razred</label>
                        <select class="form-select" name="razred" id="razred" name="razred">
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="odjeljenje" class="form-label">Odjeljenje</label>
                        <input type="number" class="form-control" id="odjeljenje" name="odjeljenje">
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <a href="ucenici.php"><button class="btn btn-secondary me-1">Cancel</button></a>
                        <button type="submit" id="saveButton" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/php/foot.php'); ?>
