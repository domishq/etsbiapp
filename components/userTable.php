<?php
require('api/user.php');
$users = getAllUsers();
?>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($users) {
            foreach ($users as $id => $user) {
                echo "<tr>";
                echo "<td>" . $id + 1 . "</td>";
                echo "<td>" . $user['name'] . "</td>";
                echo "<td>" . $user['surname'] . "</td>"; // This column has a static value for demonstration
                echo "<td>" . $user['username'] . "</td>"; // This column also has a static value for demonstration
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>