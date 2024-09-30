<?php
include_once 'database.php';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'createUvjerenje':
            $ucenikId = $_POST['ucenikId'];
            //$userId = $_SESSION['userId'];

            $query = "INSERT INTO uvjerenja(ucenikId) VALUES('$ucenikId')";
            $query_run = mysqli_query($conn, $query);

            header("Location: ../uvjerenja.php?succes=uvjerenjeIsprintano");
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
function getAllUvjerenja()
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

function countUvjerenja()
{
    global $conn;

    $sql = "SELECT COUNT(*) AS total_uvjerenja FROM uvjerenja";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_uvjerenja'];
    } else {
        return 0;
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