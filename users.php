<?php
require_once('includes/php/head.php');
require_once('components/sidebar.php');
?>

<section class="my-5">
    <div class="container">
        <form class="addUserForm" action="api/user.php?action=createUser" method="post">
            <input type="text" placeholder="Name" name="name">
            <input type="text" placeholder="Surname" name="surname">
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Confirm password" name="confirmPassword">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>    
</section>

<section class="my-5">
    <div class="container my-5">
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