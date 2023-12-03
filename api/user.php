<?php
require 'database.php';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'createUser':
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $username = strtolower($_POST['username']);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            if (empty($username) || empty($password) || empty($name) || empty($surname) || empty($confirmPassword)) {
                header("Location: ../index.php?error=emptyfields&username=" . $username);
                exit();
            } else if (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
                header("Location: ../index.php?error=invalidusername&username=" . $username);
                exit();
            } else if ($password !== $confirmPassword) {
                header("Location: ../index.php?error=passwordsdonotmatch&username=" . $username);
                exit();
            } else {
                $sql = "SELECT username FROM users WHERE username = ?";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $rowCount = mysqli_stmt_num_rows($stmt);

                    if ($rowCount > 0) {
                        header("Location: ../registerNewUser.php?error=usernametaken");
                        exit();
                    } else {
                        $sql = "INSERT INTO users(username, password, name, surname) VALUES(?, ?, ?, ?);";

                        $stmt = mysqli_stmt_init($conn);


                        if (!mysqli_stmt_prepare($stmt, $sql) && !mysqli_stmt_prepare($stmt2, $sql2)) {
                            header("Location: ../registerNewUser.php?error=sqlerror");
                            exit();
                        } else {
                            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedPass, $name, $surname);
                            mysqli_stmt_execute($stmt);

                            header("Location: ../index.php?succes=registered");
                            exit();
                        }

                    }
                }
            }
            mysqli_stmt_close($stmt);

            mysqli_close($conn);
            break;
    }
}

function getAllUsers()
{
    global $conn;

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    } else {
        return array();
    }
}

?>

<?php
/* 
require 'database.php';
$akcija = $_GET['action'];
session_start();

switch($akcija){
    case "edit_skolu":
    if(isset($_POST['submitSchoolEdits']))
    {
    $schoolId = $_POST['schoolId'];
    $newSchoolName = $_POST['newSchoolName'];
    $newEducationType = $_POST['newEducationType'];
    
    $query = "UPDATE `skole` 
    SET skola='$newSchoolName', tipObrazovanja='$newEducationType' 
    WHERE id = '$schoolId'";
    $query_run = mysqli_query($conn, $query);
    
    $employeeId = $_SESSION['sessionId'];
    $message = "skola " . $schoolId . " editovana"; 
    $sql5 = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
    $query_run = mysqli_query($conn, $sql5);
    
    }
    header("Location: ../skole.php");
    exit();
    break;

    
    case "dodaj_skolu":
    if(isset($_POST['submitNewSchool']))
    {
        $addSchoolName = $_POST['schoolName'];
        $addEducationType = $_POST['educationType'];

        $query = "INSERT INTO skole(skola, tipObrazovanja) VALUES('$addSchoolName', '$addEducationType')";
        $query_run = mysqli_query($conn, $query);

        $last_id = mysqli_insert_id($conn);

        $employeeId = $_SESSION['sessionId'];

        $message = "skola " . $last_id . " dodana"; 
        $sql5 = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
        $query_run = mysqli_query($conn, $sql5);
    }
    
    header("Location: ../skole.php");
    exit();
    break;

    case "edit_kandidata":
        $userId = trim($_POST['userId']);
        $name = trim($_POST['ime']);
        $surname = trim($_POST['prezime']);
        $telephoneNumber = trim($_POST['brojTelefona']);
        $adress = trim($_POST['adresa']);
        $postalCode = trim($_POST['postanskiBroj']);
        $city = trim($_POST['grad']);
        $drzavaId = $_POST['drzava'];
        
            $query = "UPDATE `kandidati` 
            SET ime='$name', prezime='$surname', brojTelefona='$telephoneNumber', adresa='$adress', postanskiBroj='$postalCode', grad='$city', Drzava_id='$drzavaId'   
            WHERE id = '$userId'";
            $query_run = mysqli_query($conn, $query);

        //echo "Id: " . $userId . "<br>Ime: " . $name . "<br>Prezime: " . $surname . "<br>Broj telefona: " . $telephoneNumber . "<br>Adresa: " . $adress . "<br>Postanski broj: " . $postalCode . "<br>Grad: " . $city . "<br>Drzava: " . $countryName . "<br>Drzava id: " . $drzavaId;
    header("Location: ../kandidati.php?changessaved");
    exit();
    break;

    case "delete_kandidata":
    $kandidatId = $_POST['kandidatId'];

    $query = "DELETE FROM `kandidati` WHERE id='$kandidatId'";
    $query_run = mysqli_query($conn, $query);
    
    $query2 = "DELETE FROM `skole_kandidati` WHERE kandidatId='$kandidatId'";
    $query_run = mysqli_query($conn, $query2);

    $employeeId = $_SESSION['sessionId'];
    $message = "kandidat " . $kandidatId . " izbrisan"; 
    $sql5 = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
    $query_run = mysqli_query($conn, $sql5);
    
    header("Location: ../kandidati.php?deletesuccess_id=" . $kandidatId);
    exit();
    break;

    case "dodaj_kandidata":

    if(isset($_SESSION['sessionId']))
        $employeeId = $_SESSION['sessionId'];
    else $employeeId = 0;
    $i=1;
    $name = trim($_POST['ime']);
    $surname = trim($_POST['prezime']);
    $maxClone = ($_POST['maxClone']);

    $telephoneNumber = trim($_POST['brojTelefona']);
    $adress = trim($_POST['adresa']);
    $postalCode = trim($_POST['postanskiBroj']);
    $city = trim($_POST['grad']);
    $drzavaId = $_POST['drzava'];

    $query = "INSERT INTO kandidati(ime, prezime, brojTelefona, adresa, postanskiBroj, grad, drzava_id, arhiviran, izvor, rucniUnos) VALUES('$name', '$surname', '$telephoneNumber', '$adress', '$postalCode', '$city', '$drzavaId', 'ne', '1' , '$employeeId')";
    $query_run = mysqli_query($conn, $query);

    $last_id = mysqli_insert_id($conn);
    
    while($i <= $maxClone)
    {
        if(isset($_POST['skola' . $i]))
        {
            ${'school' . $i} = $_POST['skola' . $i];
            $query2 = "INSERT INTO skole_kandidati(kandidatId,skolaId) VALUES('$last_id' ,'${'school' . $i}')";
            $query_run = mysqli_query($conn, $query2);
        } 
        $i++;  
    }

    if($employeeId!=0)
    {

        $message = "kandidat " . $last_id . " dodan"; 
        $sql5 = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
        $query_run = mysqli_query($conn, $sql5);
    }

    if(isset($_POST['site']))
    {
       $siteId = $_POST['site'];
       $query3 = "UPDATE links 
       SET brojRegistracija = brojRegistracija + 1
       WHERE id = '$siteId';";
       $query_run = mysqli_query($conn, $query3);

       $query4 = "UPDATE kandidati
       SET izvor = '2', stranicaId = '$siteId'
       WHERE id=$last_id";
       $query_run = mysqli_query($conn, $query4);
       header("Location: ../registerforjobstep.php?site=" . $siteId . "&kandidatdodan");
       exit();
       break;
    }
    
    header("Location: ../kandidati.php?kandidatdodan");
    exit();
    break;

    case "arhiviraj":
    
    if($_GET['visibility'])
    $visiblity=$_GET['visibility'];
    
    if(isset($_POST['arhivaBtn']))
    $statement='da';

    else if(isset($_POST['dearhivaBtn']))
    $statement='ne';

    $kandidatId = $_POST['kandidatId'];
    $query = "UPDATE `kandidati` 
    SET arhiviran = '$statement'   
    WHERE id = '$kandidatId'";
    $query_run = mysqli_query($conn, $query);  


    $employeeId = $_SESSION['sessionId'];
    $message = "kandidat " . $kandidatId . " arhiviran"; 
    $sql5 = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
    $query_run = mysqli_query($conn, $sql5);


    if($statement=='da')
    header("Location: ../kandidati.php?kandidatarhiviran&visibility=".$visiblity);

    if($statement=='ne')
    header("Location: ../kandidati.php?kandidatdearhiviran&visibility=".$visiblity);
    
    exit();
    break;


    case "uredi_kandidata":
        $i=1;
        $kandidatId = $_POST['kandidatId'];
        $name = trim($_POST['ime']);
        $surname = trim($_POST['prezime']);
    
        $telephoneNumber = trim($_POST['brojTelefona']);
        $adress = trim($_POST['adresa']);
        $postalCode = trim($_POST['postanskiBroj']);
        $city = trim($_POST['grad']);
        $drzavaId = $_POST['drzava'];
        
        /*while($_POST['skola' . $i])
        {
            ${'school' . $i} = $_POST['skola' . $i];
            ${'oldSchool' . $i} = $_POST['staraSkola' . $i];
            $query2 = 
            "UPDATE skole_kandidati
            SET skolaId = '${'school' . $i}'
            WHERE kandidatId = '$kandidatId'
            AND skolaId =  '${'oldSchool' . $i}'
            ";
            $query_run = mysqli_query($conn, $query2);
            $i++;
        }
        */

/*
$query = "UPDATE `kandidati` 
SET ime='$name', prezime='$surname', brojTelefona='$telephoneNumber', adresa='$adress', postanskiBroj='$postalCode', grad='$city', Drzava_id='$drzavaId'   
WHERE id = '$kandidatId'";
$query_run = mysqli_query($conn, $query);

$employeeId = $_SESSION['sessionId'];

$message = "kandidat " . $kandidatId . " editovan"; 
$sql5 = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
$query_run = mysqli_query($conn, $sql5);

header("Location: ../kandidat.php?id=" . $kandidatId);
exit();
break;





case "uredi_kandidata2":
    $i=1;
    $maxClone = $_POST['maxClone'];
    $kandidatId = $_POST['kandidatId'];
    $name = trim($_POST['ime']);
    $surname = trim($_POST['prezime']);

    $telephoneNumber = trim($_POST['brojTelefona']);
    $adress = trim($_POST['adresa']);
    $postalCode = trim($_POST['postanskiBroj']);
    $city = trim($_POST['grad']);
    $drzavaId = $_POST['drzava'];

    $i=1;

    $sql6 = "SELECT * FROM skole_kandidati WHERE kandidatId='$kandidatId'";
    $result6 = mysqli_query($conn, $sql6);
    while($row6 = mysqli_fetch_assoc($result6))
    {
        $kandidatId=$row6['kandidatId'];
        $skolaId=$row6['skolaId'];

        if(isset($_POST['staraSkola' . $i]))
        {
            ${'oldSchool' . $i} = $_POST['staraSkola' . $i];
            $query7 = "UPDATE skole_kandidati
            SET skolaId = '${'oldSchool' . $i}'
            WHERE kandidatId = '$kandidatId' AND skolaId = '$skolaId'";
            $query_run = mysqli_query($conn, $query7);
            
        }
        
        else
        {
            $query7 = "DELETE FROM skole_kandidati WHERE kandidatId = '$kandidatId' AND skolaId='$skolaId'";
            $query_run = mysqli_query($conn, $query7);  
        }

        $i++;  
    }

    $i=1;

    while($i <= $maxClone)
    {
        if(isset($_POST['skola' . $i]))
        {
            ${'school' . $i} = $_POST['skola' . $i];
            $query2 = "INSERT INTO skole_kandidati(kandidatId,skolaId) VALUES('$kandidatId' ,'${'school' . $i}')";
            $query_run = mysqli_query($conn, $query2);
        } 
        $i++;  
    }


    $query = "UPDATE `kandidati` 
    SET ime='$name', prezime='$surname', brojTelefona='$telephoneNumber', adresa='$adress', postanskiBroj='$postalCode', grad='$city', Drzava_id='$drzavaId'   
    WHERE id = '$kandidatId'";
    $query_run = mysqli_query($conn, $query);

    $employeeId = $_SESSION['sessionId'];

    $message = "kandidat " . $kandidatId . " editovan"; 
    $sql5 = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
    $query_run = mysqli_query($conn, $sql5);


    header("Location: ../kandidat.php?id=" . $kandidatId);
    exit();
    break;

    case "dodaj_stranicu":
    
    $pageName = $_POST['imeStranice'];

    $query = "INSERT INTO links(imeStranice)
    VALUES ('$pageName');";

    $query_run = mysqli_query($conn, $query);

    $last_id = mysqli_insert_id($conn);

    $employeeId = $_SESSION['sessionId'];

        $message = "stranica " . $pageName . "[" . $last_id . "] dodana"; 
        $sql5 = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
        $query_run = mysqli_query($conn, $sql5);

    header("Location: ../links.php?stranicadodana");
    exit();
    break;

case "sign_out":
    unset($_SESSION);
    session_destroy();
    session_write_close();
    header("Location: ../index.php");
    die;
    break;

case "edit_account":
{
    $userId = $_POST['userId'];
    $username = $_POST['newUsername'];
    $role = $_POST['newRole'];

    $query = "UPDATE users
            SET  username = '$username', role = '$role'
            WHERE id = '$userId'";
            $query_run = mysqli_query($conn, $query);


    $employeeId = $_SESSION['sessionId'];

    $message = "user " . $userId . " editovan"; 
    $sql = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
    $query_run = mysqli_query($conn, $sql);
    header("Location: ../users.php?usereditovan");
    exit();
    break;
}

case "arhiviraj_usera":


    $kandidatId = $_POST['userId'];
    $visiblity = $_GET['visibility'];
    $deleteAction = $_POST['deleteAction'];            
    $employeeId = $_SESSION['sessionId'];

    $statement='ne';
    
    if($deleteAction=='delete')
    {
        $message = "kandidat " . $kandidatId . " arhiviran";
        $statement='da';
    } 
    else
    $message = "kandidat " . $kandidatId . " recoveran";

    $sql5 = "INSERT INTO logovi(date, action, userId) VALUES('$message', $employeeId)";
    $query_run = mysqli_query($conn, $sql5);
    
    $query = "UPDATE `users` 
    SET arhiviran = '$statement'   
    WHERE id = '$kandidatId'";
    $query_run = mysqli_query($conn, $query);  



    if($statement=='da')
    header("Location: ../users.php?kandidatarhiviran&visibility=".$visiblity);

    if($statement=='ne')
    header("Location: ../users.php?kandidatrecoveran&visibility=".$visiblity);
    
    exit();
    break;
}*/