<?php
require_once('includes/php/head.php');
require_once('components/sidebar.php');
?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1>Add user</h1>
        </div>
    </div>
    <hr class="mb-5 mt-2">
    <div class="row">
        <div class="col-5 m-auto">
            <form class="addUserForm" action="api/user.php?action=createUser" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                </div>
                <div class="col-12 d-flex justify-content-end">
                        <a href="users.php"><button class="btn btn-secondary me-1">Cancel</button></a>
                        <button type="submit" id="saveButton" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once('includes/php/foot.php');
?>