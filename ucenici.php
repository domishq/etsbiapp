<?php
require_once('includes/php/head.php');
?>

<div class="container">
    <form action="api/ucenik.php?action=createUcenik" method="post">
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Surname" name="surname">
        <input type="text" placeholder="Parents name" name="parentsName">
        <input type="date" name="dateOfBirth">
        <select name="razred">
            <option value="1">I</option>
            <option value="2">II</option>
            <option value="3">III</option>
            <option value="4">IV</option>
        </select>
        <input type="number" name="odjeljenje">
        <button type="submit" name="submit">Submit</button>
    </form>
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