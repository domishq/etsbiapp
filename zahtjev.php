<?php
    //implement multiple select with https://demo.mobiscroll.com/jquery/select/single-select#
    require_once('includes/php/head.php'); 
?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1>Kreiraj zahtjev</h1>
        </div>
    </div>
    <hr class="mb-5 mt-2">
    <div class="row">
        <div class="col-12">
            <div class="zahtjevForm">
                <form action="api/zahtjev.php?action=createZahtjev" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Ime</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Prezime</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="mb-3">
                        <label for="parentsName" class="form-label">Ime roditelja</label>
                        <input type="text" class="form-control" id="parentsName" name="parentsName">
                    </div>
                    <div class="mb-3">
                        <label for="dateOfBirth" class="form-label">Datum rođenja</label>
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
                    <div class="mb-3">
                        <label for="razlozi" class="form-label">Razlozi</label>
                        <select class="form-select" multiple aria-label="Multiple select example" id="razlozi" name="razlozi">
                            <option selected>Izaberi razloge</option>
                            <option value="1">U svrhu regulisanja zdravstvenog osiguranja</option>
                            <option value="2">U svrhu troskova prijevoza</option>
                            <option value="3">U svrhu povrata poreza</option>
                            <option value="4">U svrhu otvaranja racuna u banci</option>
                            <option value="5">U svrhu stipendije</option>
                        </select>
                    </div>
                    <div class="col-12 d-flex mt-5">
                        <button class="btn btn-light" type="reset" style="width: 100%; border-color: gray;margin-right: 5px;">Reset</button>
                        <button type="submit" id="saveButton" class="btn btn-primary" style="width: 100%;">Spremi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/php/foot.php'); ?>
