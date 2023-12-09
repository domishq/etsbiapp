<?php
require_once('includes/php/head.php');

$name = $_GET['name'];
$surname = $_GET['surname'];
$parentsName = $_GET['parentsName'];
$dateOfBirth = $_GET['dateOfBirth'];

$date = date("j.n.Y");

?>

<div class="container">
    <div class="mb-3">
        <h4>JU MJEŠOVITA ELEKTROTEHNIČKA I<br>DRVOPRERAĐIVAČKA SREDNJA ŠKOLA<br>BIHAĆ</h4>
        <p>Broj <span contenteditable="true">1286/23</span></p>
        <p>Datum, <?php echo $date?>.god.</p>
    </div>
    <div>
        <p>Na osnovu čl. 169. Zakona o upravnom postupku (&sbquo;Službene novine FBiH&lsquo;, br: 02/98 i 48/99), a na osnovu zahtjeva <?php echo $surname . ' (' . $parentsName . ') ' . $name;?>, izdaje se:</p>
    </div>

</div>

<div class="buttons">
    <div class="d-flex justify-content-center">
        <a href="ucenici.php"><button class="btn btn-secondary me-1">Close</button></a>
        <button id="print" class="btn btn-primary ms-1">Print</button>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#print').click(() => {
            $('.buttons').hide();
            window.print();
        });
    });
</script>

<?php
require_once('includes/php/foot.php');
?>