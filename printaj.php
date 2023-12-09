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
        <p>Datum,
            <?php echo $date ?>.god.
        </p>
    </div>
    <div class="mb-5">
        <p>Na osnovu čl. 169. Zakona o upravnom postupku (&sbquo;&sbquo;Službene novine FBiH&lsquo;&lsquo;, br: 02/98 i
            48/99), a na osnovu zahtjeva
            <?php echo $surname . ' (' . $parentsName . ') ' . $name; ?>, izdaje se:
        </p>
    </div>
    <div class="mt-5 mb-5 text-center">
        <h5>UVJERENJE</h5>
    </div>
    <div class="mt-5">
        <p>
            Da je LALIĆ MELISA Sin/Kći EKREM-a rođen-a 19.02.2006. u Bihaću, općina Bihać, redovan-na je učenik-ca
            trećeg (III) razreda i redovno pohađa nastavu u školskoj 2023/2024 godini. Uvjerenje se izdaje na osnovu
            službene evidencije škole, a u svrhu regulisanja zdravstvenog osiguranja, te se za druge svrhe ne može
            koristiti.
        </p>
    </div>
</div>

<div class="buttons onPrintHide">
    <div class="d-flex justify-content-center">
        <a href="ucenici.php"><button class="btn btn-secondary me-1">Close</button></a>
        <button id="print" class="btn btn-primary ms-1">Print</button>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#print').click(() => {
            window.print();
        });
    });
</script>

<?php
require_once('includes/php/foot.php');
?>