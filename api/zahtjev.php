<?php
include_once 'database.php';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'createZahtjev':
           // $ucenikId = $_POST['ucenikId'];
            //$userId = $_SESSION['userId'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $parentsName = $_POST['parentsName'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $razred = $_POST['razred'];
            $odjeljenje = $_POST['odjeljenje'];

            $query = "INSERT INTO ucenici(name, surname, parentsName, dateOfBirth, razred, odjeljenje) VALUES('$name', '$surname', '$parentsName', '$dateOfBirth', '$razred', '$odjeljenje')";
            //$query_run = mysqli_query($conn, $query);

            if ($conn->query($query) === TRUE)
            {
                $ucenikId = $conn->insert_id; 
                $query = "INSERT INTO zahtjev(ucenikId) VALUES('$ucenikId')";
                $query_run = mysqli_query($conn, $query);
            }
            header("Location: ../zahtjev.php?succes=zahtjevKreiran");
            break;

        /*case 'getUcenikById':
            if(isset($_GET['ucenikId'])) {
                $ucenikId = $_GET['ucenikId'];
                $ucenik = getUcenikById($ucenikId);
                if($ucenik) {
                    echo json_encode($ucenik);
                } else {
                    echo json_encode(array('error' => 'Ucenik not found')); 
                }
            } else {
                echo json_encode(array('error' => 'Ucenik ID not provided'));
            }
        break;
        */
        case 'getAllUvjerenja':
            $uvjerenja = getAllUvjerenja();
            echo json_encode($uvjerenja);
        break;
    }
}
/*function getAllUvjerenja()
{
    global $conn;

    $sql = "SELECT * FROM uvjerenja";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $uvjerenja = array();
        while ($row = $result->fetch_assoc()) {
            $uvjerenja[] = $row;
        }
        return $uvjerenja;
    } else {
        return array();
    }
}
*/
function countApprovedUvjerenja()
{
    global $conn;

    $sql = "SELECT COUNT(*) AS approvedUvjerenja FROM zahtjev WHERE isApproved = 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['approvedUvjerenja'];
    } else {
        return 0;
    }
}

function countRequestedUvjerenja()
{
    global $conn;

    $sql = "SELECT COUNT(*) AS requestedUvjerenja FROM zahtjev WHERE isApproved = 0";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['requestedUvjerenja'];
    } else {
        return 0;
    }
}

function getAllUceniciRequests()
{
    global $conn;

    $sql = "SELECT u.*,z.createdAt
    FROM ucenici u
    JOIN zahtjev z ON u.id = z.ucenikId
    WHERE z.isApproved = 0;";
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

/*function getUcenikById($ucenikId)
{
    global $conn;

    $sql = "SELECT * FROM ucenici WHERE id = $ucenikId";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}*/