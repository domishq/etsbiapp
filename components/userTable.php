<?php
require('api/user.php');
$users = getAllUsers();
?>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($users) {
            foreach ($users as $id => $user) {
        ?>
                <tr class="clickable-row" data-href="editUser.php?id=<?php echo $user['user_id'] ?>">
                    <td><?php echo $id + 1 ?></td>
                    <td><?php echo $user['surname'] . ', ' . $user['name'] ?></td>
                    <td><?php echo $user['username'] ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });

        $('#myTable').DataTable();
    });
</script>
