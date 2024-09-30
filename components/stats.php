<?php
require_once('api/ucenik.php');
require_once('api/user.php');
require_once('api/uvjerenje.php');
require_once('api/zahtjev.php');

$numberOfUcenici = countUcenici();
$numberOfUsers = countUsers();
//$numberOfRequestedUvjerenja= countRequestedUvjerenja();
//$numberOfApprovedZahtjeva = countApprovedUvjerenja();
?>

<div class="container my-5 mx-auto">
    <div class="row justify-content-center mx-5">
        <!-- <div class="col-3">
            <div class="statsCard">
                <div class="statsContent">
                    <p class="statsNumber"><?php //echo $numberOfRequestedUvjerenja ?></p>
                    <p class="statsDescription text-center">Trenutnih zahtjeva</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="statsCard">
                <button class="statsAdd"><a href="printaj.php">+</a></button>
                <div class="statsContent">
                    <p class="statsNumber"><?php //echo $numberOfApprovedZahtjeva ?></p>
                    <p class="statsDescription text-center">Odobrenih zahtjeva</p>
                </div>
            </div>
        </div> -->
        <div class="col-3">
            <div class="statsCard" onClick="window.location.href = 'ucenici.php';">
                <button class="statsAdd"><a href="addUcenik.php">+</a></button>
                <div class="statsContent">
                    <p class="statsNumber"><?php echo $numberOfUcenici; ?></p>
                    <p class="statsDescription text-center">Broj ucenika</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="statsCard" onClick="window.location.href = 'users.php';">
                <button class="statsAdd"><a href="addUser.php">+</a></button>
                <div class="statsContent">
                    <p class="statsNumber"><?php echo $numberOfUsers; ?></p>
                    <p class="statsDescription text-center">Broj korisnika</p>
                </div>
            </div>
        </div>
    </div>
</div>