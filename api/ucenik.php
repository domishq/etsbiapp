<?php
include_once 'database.php';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'createUcenik':
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $parentsName = $_POST['parentsName'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $razred = $_POST['razred'];
            $odjeljenje = $_POST['odjeljenje'];

            $query = "INSERT INTO ucenici(name, surname, parentsName, dateOfBirth, razred, odjeljenje) VALUES('$name', '$surname', '$parentsName', '$dateOfBirth', '$razred', '$odjeljenje')";
            $query_run = mysqli_query($conn, $query);

            header("Location: ../ucenici.php?succes=ucenikCreated");
            break;

        case 'getUcenikById':
            if (isset($_GET['ucenikId'])) {
                $ucenikId = $_GET['ucenikId'];
                $ucenik = getUcenikById($ucenikId);
                if ($ucenik) {
                    echo json_encode($ucenik);
                } else {
                    echo json_encode(array('error' => 'Ucenik not found'));
                }
            } else {
                echo json_encode(array('error' => 'Ucenik ID not provided'));
            }
            break;

        case 'getAllUcenici':
            $ucenici = getAllUcenici();
            echo json_encode($ucenici);
            break;

        case 'updateUcenik':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ucenikId = $_POST['ucenikId'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $parentsName = $_POST['parentsName'];

                $success = updateUcenik($ucenikId, $name, $surname, $parentsName);

                if ($success) {
                    echo json_encode(array('message' => 'User updated successfully'));
                } else {
                    echo json_encode(array('error' => 'Failed to update user'));
                }
            } else {
                echo json_encode(array('error' => 'Invalid request method'));
            }
            break;
    }
}

function getAllUcenici()
{
    global $conn;

    $sql = "SELECT *
    FROM ucenici";
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

function countUcenici()
{
    global $conn;

    $sql = "SELECT COUNT(*) AS total_ucenici FROM ucenici";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_ucenici'];
    } else {
        return 0;
    }
}

function getUcenikById($ucenikId)
{
    global $conn;

    $sql = "SELECT * FROM ucenici WHERE id = $ucenikId";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function updateUcenik($ucenikId, $name, $surname, $parentsName)
{
    global $conn;

    $sql = "UPDATE ucenici SET name = '$name', surname = '$surname', parentsName = '$parentsName' WHERE id = $ucenikId";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}