<?php

require_once 'instituten.class.php';

if (isset($_POST["submit"]) == "POST") {
    $instituut = new Instituut($pdo);

    if (isset($_POST['id'])) {
        $instituut->id = intval($_POST['id']);
    }

    $instituut->institute = $_POST['institute'];
    $instituut->city = $_POST['city'];
    $instituut->address = $_POST['address'];

    $instituut->Save();
}else if (isset($_GET['id'])) {
    $instituut = new Instituut($pdo);

    $instituut->Delete($_GET['id']);
} 

header("Location: ../../pages/instituten/instituten.php");
exit();