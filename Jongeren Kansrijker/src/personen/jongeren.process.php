<?php

require_once 'jongeren.class.php';

if (isset($_POST["submit"]) == "POST") {
    $jongere = new Jongere($pdo);

    if (isset($_POST['id'])) {
        $jongere->id = intval($_POST['id']);
    }

    $jongere->firstName = $_POST['firstName'];
    $jongere->lastName = $_POST['lastName'];
    $jongere->birthDate = $_POST['birthDate'];

    $jongere->Save();
}else if (isset($_GET['id'])) {
    $jongere = new Jongere($pdo);
    
    $jongere->Delete($_GET['id']);
} 

header("Location: ../../pages/jongeren/jongeren.php");
exit();
