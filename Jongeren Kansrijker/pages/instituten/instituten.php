<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/nav.css">

    <title>Instituten</title>
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

    <h2>Instituten</h2>

    <form action="../../src/instituten/instituten.process.php" method="post">
        <div class="input-group">
            <div class="input-field">
                <label for="instituteInput">Instituut:</label>
                <input type="text" id="instituteInput" name="institute" required>
            </div>

            <div class="input-field">
                <label for="cityInput">Stad:</label>
                <input type="text" id="cityInput" name="city" required>
            </div>

            <div class="input-field">
                <label for="addressInput">Adres:</label>
                <input type="text" id="addressInput" name="address" required>
            </div>

            <button name="submit">Toevoegen</button>
        </div>
    </form>

    <table id="instituteTable">
        <thead>
            <tr>
                <th class="th25">Instituut</th>
                <th class="th25">Stad</th>
                <th class="th25">Adres</th>
                <th class="th25">Actie</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            require_once '../../src/instituten/instituten.class.php';
            echo Instituut::DisplayInstituten($pdo);
            ?>
        </tbody>
    </table>

</body>

</html>