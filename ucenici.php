<?php
require_once('includes/php/head.php');
require_once('components/sidebar.php');
?>

<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-end">
            <a href="addUcenik.php"><button class="btn btn-primary" type="button">Add</button></a>
        </div>
    </div>
</div>

<div class="container">
    <?php
    require_once('components/uceniciTable.php');
    ?>
</div>

<!-- JS -->
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

<?php
require_once('includes/php/foot.php'); ?>