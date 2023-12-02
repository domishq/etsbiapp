<?php 
require 'database.php';
if(isset($_GET['action']))
{
    $action = $_GET['action'];
    switch($action){
        case 'createUcenik':
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $parentsName = $_POST['parentsName'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $razred = $_POST['razred'];
            $odjeljenje = $_POST['odjeljenje'];
    
            $query = "INSERT INTO ucenici(name, surname, parentsName, dateOfBirth, razred, odjeljenje) VALUES('$name', '$surname', '$parentsName', '$dateOfBirth', '$razred', '$odjeljenje')";
            $query_run = mysqli_query($conn, $query);
        break;
    }
}

function getAllUcenici($conn){
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM ucenici";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $ucenici = array();
        while ($row = $result->fetch_assoc()) {
            $ucenici[] = $row;
        }
        return $ucenici;
    } else {
        return array();
    }
}