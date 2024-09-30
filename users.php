<?php
require_once('includes/php/head.php');
require_once('components/sidebar.php');
?>
<section class="my-5">
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1>Users</h1>
            </div>
        </div>
        <hr class="mb-5 mt-2">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <a href="addUser.php"><button class="btn btn-primary addButton" type="button">Add</button></a>
            </div>
        </div>
        <?php
            require_once('components/userTable.php');
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