<!DOCTYPE html>
<html>

<head>
    <title>ETSBI</title>

    <!-- Default -->
    <link rel="stylesheet" href="includes/css/style.css">
    <link rel="stylesheet" href="includes/css/sidebar.css">
    <link rel="stylesheet" href="includes/css/dataTable.css">

    <!-- JQuery and dataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="loader">
        <div class="spinner-container" id="loader">
            <div class="spinner-grow" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div class="hide aplikacija">
        <?php
        require_once('components/sidebar.php');
        ?>