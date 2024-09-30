<?php
require_once('includes/php/head.php');
require_once('components/sidebar.php');
?>
<section class="my-5">
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1>Zahtjevi</h1>
            </div>
        </div>
        <hr class="mb-5 mt-2">
        <?php
            require_once('components/uceniciRequestsTable.php');
        ?>
    </div>
</section>

<!-- JS -->
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

<?php
require_once('includes/php/foot.php'); ?>