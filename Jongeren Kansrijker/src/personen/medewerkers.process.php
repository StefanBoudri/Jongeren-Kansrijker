<?php

require_once 'medewerkers.class.php';

if (isset($_POST["submit"]) == "POST") {
    $medewerker = new Medewerker($pdo);

    if (isset($_POST['id'])) {
        $medewerker->id = intval($_POST['id']);
    }

    $medewerker->firstName = $_POST['firstName'];
    $medewerker->lastName = $_POST['lastName'];
    $medewerker->birthDate = $_POST['birthDate'];
    $medewerker->role = $_POST['role'];
    $medewerker->inService = $_POST['inService'];

    $medewerker->Save();
}else if (isset($_GET['id'])) {
    $medewerker = new Medewerker($pdo);

    $medewerker->Delete($_GET['id']);
} 

header("Location: ../../pages/medewerkers/medewerkers.php");
exit();
