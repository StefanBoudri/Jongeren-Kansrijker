<?php
require '../../src/dbconnect.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$statement = $pdo->prepare("SELECT * FROM instituten WHERE id = :id" );
$statement->execute([':id' => $id]);

$instituut = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/nav.css">

    <title>Instituten bewerken</title>
</head>

<body>

    <nav>
        <div class="logo">
            <a href="#">Jongeren Kansrijker</a>
        </div>
        <div class="menu">
            <a href="../medewerkers/medewerkers.php">Medewerkers</a>
            <a href="../jongeren/jongeren.php">Jongeren</a>
            <a href="../activiteiten/activiteiten.php">Activiteiten</a>
            <a href="../instituten/instituten.php">Instituten</a>
            <a id="log" href="#">Inloggen / Uitloggen</a>
        </div>
    </nav>

    <h2><?php echo "Gegevens van " . $instituut["institute"] . " bewerken"?></h2>

    <form action="../../src/instituten/instituten.process.php" method="post">
    
    <input type="hidden" name="id" value="<?php echo $id ?>">
    
    <div class="input-group">
            <div class="input-field">
                <label for="instituteInput">Instituut:</label>
                <input type="text" id="instituteInput" name="institute" value="<?php echo $instituut["institute"] ?>" required>
            </div>

            <div class="input-field">
                <label for="cityInput">Stad:</label>
                <input type="text" id="cityInput" name="city" value="<?php echo $instituut["city"] ?>" required>
            </div>

            <div class="input-field">
                <label for="addressInput">Adres:</label>
                <input type="text" id="addressInput" name="address" value="<?php echo $instituut["address"] ?>" required>
            </div>

            <button name="submit">Wijzig</button>
        </div>
    </form>