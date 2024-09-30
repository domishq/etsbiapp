<?php require_once('includes/php/head.php'); 
?>

<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="d-flex flex-column align-items-center loginContainer">
        <h1>Log in</h1>
        <p>Here you can log in to your account</p>
        <form action="api/user.php?action=login" method="post" class="form">
            <div class="mt-2">
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
            <div class="mt-2">
                <span for="password">Password</span>
                <input type="password" name="password">
            </div>
            <div class="d-flex mt-4">
                <button class="btn btn-primary flex-grow-1" type="submit" name="submit">LOG IN</button>
            </div>
        </form>
    </div>
</div>

<?php require_once('includes/php/foot.php'); ?>
