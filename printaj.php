<?php
require_once('includes/php/head.php');

if(isset($_GET['ucenikId']))
{
    echo '<input type="hidden" id="ucenikId" value=' . $_GET['ucenikId'] . '>';
}
else
    {?>
    <div class="onPrintHide">
        <label for="fileInput" class="drop-container onPrintHide" id="dropcontainer">
          <span class="drop-title">Drop files here</span>
          or
          <input type="file" id="fileInput" accept=".xlsx, .xls, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
        </label>
    </div>
    <?php
    }
?>

<div id="displayContent">

</div>

<?php
    //include('includes/php/uvjerenjeTemplate.php');
?>

<div class="buttons mt-5 onPrintHide">
    <div class="d-flex justify-content-center">
        <a href="uvjerenja.php"><button class="btn btn-secondary me-1">Close</button></a>
        <button id="print" class="btn btn-primary ms-1">Print</button>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#print').click(() => {
            window.print();
        });
    });

    $(document).ready(function() {
        var ucenikId = $('#ucenikId').val();
        
        $.ajax({
        url: 'api/ucenik.php?action=getUcenikById&ucenikId=' + ucenikId,
        method: 'GET',
        success: function(response) {
            const ucenik = JSON.parse(response);
            //const raz = intToRom(ucenik.razred);

           /* $('.name').text(ucenik.name);
            $('.surname').text(ucenik.surname);
            $('.parentsName').text(ucenik.parentsName);
            $('.city').text(ucenik.city);
            $('.razred').text(raz.rom);
            $('.razTxt').text(raz.txt);
            $('.dateOfBirth').text(reformatDate(ucenik.dateOfBirth));*/

            // After successfully getting the data, trigger the second AJAX call
            $.ajax({
                url: 'includes/php/uvjerenjeTemplate.php',
                method: 'POST',
                data: {
                    name: ucenik.name,
                    surname: ucenik.surname,
                    dateOfBirth: ucenik.dateOfBirth,
                    parentsName: ucenik.parentsName,
                    razred: ucenik.razred
                },
                success: function(response) {
                    $('#displayContent').append(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error executing PHP script:', error);
                }
            });
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
            console.log(status);
            console.log(error);
        }
        });
        /*if(ucenikId==0)
        {
            $.ajax({
                url: 'api/ucenik.php?action=getAllUcenici',
                method: 'GET',
                success: function(response) {
                    const ucenici = JSON.parse(response);
                    ucenici.forEach(function(ucenik,index) {
                        $('#ucenikId').append('<option value="' + ucenik.id + '">' + (index+1) + ' - ' + ucenik.surname + ' (' + ucenik.parentsName + ') ' + ucenik.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
        }
        else{
            populateData(ucenikId);
        }*/
    });

    $(document).ready(function() {
        $('#fileInput').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var data = new Uint8Array(e.target.result);
                var workbook = XLSX.read(data, { type: 'array' });

                var sheetName = workbook.SheetNames[0];
                var sheet = workbook.Sheets[sheetName];

                var jsonData = XLSX.utils.sheet_to_json(sheet);

                jsonData.forEach((row, index)=>{
                    $.ajax({
                        url: 'includes/php/uvjerenjeTemplate.php',
                        method: 'POST',
                        data: 
                        { 
                            name: row['Ime'], 
                            surname: row['Prezime'],
                            dateOfBirth: row['Datum rođenja (dan.mjesec.godina)'],
                            parentsName: row['Ime roditelja'],
                            razred: row['Razred'],
                        },
                        success: function(response) {
                            $('#displayContent').append(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error executing PHP script:', error);
                        }
                    });
                })
            };

            reader.readAsArrayBuffer(file);
        });
    });


function populateData(ucenikId) {
    $.ajax({
        url: 'api/ucenik.php?action=getUcenikById&ucenikId=' + ucenikId,
        method: 'GET',
        success: function(response) {
            const ucenik = JSON.parse(response);
            const raz = intToRom(ucenik.razred);

            $('.name').text(ucenik.name);
            $('.surname').text(ucenik.surname);
            $('.parentsName').text(ucenik.parentsName);
            $('.city').text(ucenik.city);
            $('.razred').text(raz.rom);
            $('.razTxt').text(raz.txt);
            $('.dateOfBirth').text(reformatDate(ucenik.dateOfBirth));
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
            console.log(status);
            console.log(error);
        }
    });
}

$('#ucenikId').change(function() {
    var selectedUcenikId = $(this).val();
    if (selectedUcenikId !== "0")
        populateData(selectedUcenikId);
});

</script>

<?php
require_once('includes/php/foot.php');
?>