<?php
require_once('includes/php/head.php');
?>

<div class="container">
    <form action="api/uvjerenje.php?action=printajUvjerenje" method="post">
        <input type="text" name="city" list="cityname">
        <datalist id="cityname">
            <option value="1">Aleks</option> 
            <option value="2">Ivana</option>
            <option value="3">Stefan</option>
            <option value="4">Ana</option>
            <option value="5">Nikola</option>
            <option value="6">Elena</option>
            <option value="7">Marko</option>
            <option value="8">Sara</option>
            <option value="9">Igor</option>
            <option value="10">Jovana</option>
            <option value="11">Vladimir</option>
            <option value="12">Petra</option>
            <option value="13">Luka</option>
            <option value="14">Teodora</option>
            <option value="15">Dusan</option>
            <option value="16">Milica</option>
            <option value="17">Bojan</option>
            <option value="18">Katarina</option>
            <option value="19">Nemanja</option>
            <option value="20">Tamara</option>
        </datalist>
        <button type="submit" name="submit">Printaj</button>
    </form>
</div>

<div class="container">
<?php
    //require_once('components/uceniciTable.php');
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