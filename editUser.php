<?php require_once('includes/php/head.php'); ?>
<?php require_once('components/sidebar.php'); ?>

<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 11;">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto" style="color:green;">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="color:green;">
            User updated successfully!
        </div>
    </div>
</div>

<section class="my-5">
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1>Edit user</h1>
            </div>
        </div>
        <hr class="mb-5 mt-2">
        <div class="row">
            <div class="col-5 m-auto">
                <form class="editUserForm" id="editUserForm" action="api/user.php?action=editUser" method="post">
                    <input type="hidden" name="userId" id="userId" value="<?php echo $_GET['id'] ;?>">
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
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="users.php"><button class="btn btn-secondary me-1">Cancel</button></a>
                <button type="submit" id="saveButton" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</section>

<!-- JS -->
<script>
    $(document).ready(function() {
        var userId = $('#userId').val();
        $.ajax({
            url: 'api/user.php?action=getUserById&userId=' + userId,
            method: 'GET',
            success: function(response) {
                var user = JSON.parse(response);
                $('#name').val(user.name);
                $('#surname').val(user.surname);
                $('#username').val(user.username);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });

        var userId = $('#userId').val();
        $.ajax({
            // ... (your existing AJAX code to fetch user data) ...
        });

        $('#saveButton').click(function(e) {
            e.preventDefault();
            var userId = $('#userId').val();
            var name = $('#name').val();
            var surname = $('#surname').val();
            var username = $('#username').val();

            $.ajax({
                url: 'api/user.php?action=updateUser',
                method: 'POST',
                data: {
                    userId: userId,
                    name: name,
                    surname: surname,
                    username: username
                },
                success: function(response) {
                    var myToastEl = document.getElementById('liveToast');
                    var bsToast = new bootstrap.Toast(myToastEl);
                    bsToast.show();
                    console.log('success');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
        });
    });
</script>

<?php require_once('includes/php/foot.php'); ?>