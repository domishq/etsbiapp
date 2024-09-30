<?php
require_once('includes/php/head.php');
require_once('components/sidebar.php');
?>

<div class="container mt-5">
    <div class="row">
        <div class="col ms-3">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>

<hr class="divider topDivider" style="width: 95%;">
    <?php
        require_once('components/stats.php');
    ?>
<hr class="divider bottomDivider" style="width: 95%;">

<?php
require_once('includes/php/foot.php'); ?>