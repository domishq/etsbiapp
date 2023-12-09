<?php
require_once('includes/php/head.php');
?>

<div class="container">
    <div class="row">
        <div class="col-5 m-auto">
            <form action="api/ucenik.php?action=createUcenik" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname">
                </div>
                <div class="mb-3">
                    <label for="parentsName" class="form-label">Parents name</label>
                    <input type="text" class="form-control" id="parentsName">
                </div>
                <div class="mb-3">
                    <label for="razred" class="form-label">Razred</label>
                    <select class="form-select" name="razred" id="razred">
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Odjeljenje</label>
                    <input type="number" class="form-control" id="number">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once('includes/php/foot.php');
?>