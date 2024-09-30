<?php

require_once('../../api/uvjerenje.php');

$date = date("j.n.Y");

$name = $_POST['name'];
$surname = $_POST['surname'];
$parentsName = $_POST['parentsName'];
$dateOfBirth = $_POST['dateOfBirth'];
$razred = Razred($_POST['razred']);
$currentMonth = date('n');
$currentYear = date('Y');
$skolskaGodina = (intval($currentMonth) < 8) ? (intval($currentYear) - 1) . '/' . $currentYear : $currentYear . '/' . (intval($currentYear) + 1);

$svrhe = $_POST['svrhe'];

$svrheArray = getUvjerenjaSvrheByIds($svrhe);
?>

<div class="mx-5 mt-5" contenteditable="true">
    <div class="mb-3">
        <div class="d-flex justify-content-between">
            <div>
                <h5 class="m-0">JU MJEŠOVITA ELEKTROTEHNIČKA I<br>DRVOPRERAĐIVAČKA SREDNJA ŠKOLA<br>BIHAĆ</h5>
                <p class="m-0">Broj <span contenteditable="true">1286/23</span></p>
                <p class="m-0">Datum,
                    <?php echo $date ?>.god.
                </p>
                <div class="mt-3">
                    <p>Na osnovu čl. 169. Zakona o upravnom postupku (&sbquo;&sbquo;Službene novine FBiH&lsquo;&lsquo;,
                        br: 02/98 i
                        48/99), a na osnovu zahtjeva
                        <span class="surname text-uppercase"><?php echo $surname ?></span> (<span
                            class="parentsName text-uppercase"><?php echo $parentsName ?></span>) <span
                            class="name text-uppercase"><?php echo $name ?></span>, izdaje se:
                    </p>
                </div>
            </div>
            <img src="includes/img/etsbilogo.png" alt="etsbi logo" style="height: 100px;aspect-ratio:1/1;">
        </div>
    </div>
    <div class="mt-5 mb-5 text-center">
        <h5>UVJERENJE</h5>
    </div>
    <div class="mt-5">
        <p>
            Da je <span class="ucenikSurname surname text-uppercase"> <?php echo $surname ?> </span> <span
                class="ucenikName name text-uppercase"><?php echo $name ?></span> Sin/Kći <span
                class="parentsName text-uppercase"><?php echo $parentsName ?></span>-a rođen-a <span class="dateOfBirth"
                id="dateOfBirth"><?php echo date('d.m.Y', strtotime($dateOfBirth)) ?></span>. u Bihaću, općina <span
                class="city">Bihać</span>,
            redovan-na je učenik-ca
            <span class="razTxt italic"><?php echo $razred[1] ?></span> (<span
                class="razred"><?php echo $razred[0] ?></span>) razreda i redovno pohađa nastavu u školskoj
            <?php echo $skolskaGodina; ?> godini. Uvjerenje se izdaje na osnovu
            službene evidencije škole, a u svrhu
            <?php
            // Loop through svrheArray and display each purpose separated by a comma
            foreach ($svrheArray as $index => $svrha) {
                echo $svrha['text'];
                if ($index == count(value: $svrheArray) - 2) {
                    echo " i ";
                } else
                    echo ", ";
            }
            ?>te se za druge svrhe ne može koristiti.
        </p>
    </div>
    <div class="mt-2 d-flex justify-content-end">
        <div class="d-flex flex-column align-items-center">
            <span style="font-size: 20px; font-weight: 400;">DIREKTOR</span>
            <div class="mt-3" style="border-top: 1px solid #000; width:fit-content">
                <span>(Samir Bećirspahić, dipl. ing.)</span>
            </div>
        </div>
    </div>
</div>

<?php
function Razred($num)
{
    switch (intval($num)) {
        case 1:
            return array("I", "prvog");
        case 2:
            return array("II", "drugog");
        case 3:
            return array("III", "trećeg");
        case 4:
            return array("IV", "četvrtog");
        default:
            return "unknown";
    }
}
?>