<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/nav.css">
  <title>Jongeren</title>
</head>

<body>

  <nav>
    <div class="logo">
      <a href="#">Jongeren Kansrijker</a>
    </div>
    <div class="menu">
      <a href="../medewerkers/medewerkers.php">Medewerkers</a>
      <a href="#">Jongeren</a>
      <a href="../activiteiten/activiteiten.php">Activiteiten</a>
      <a href="../instituten/instituten.php">Instituten</a>
      <a id="log" href="#">Inloggen / Uitloggen</a>
    </div>
  </nav>

  <h2>Jongeren</h2>

  <form action="../../src/personen/jongeren.process.php" method="post">
    <div class="input-group">
      <div class="input-field">
        <label for="firstNameInput">Voornaam:</label>
        <input type="text" id="firstNameInput" name="firstName" required>
      </div>

      <div class="input-field">
        <label for="lastNameInput">Achternaam:</label>
        <input type="text" id="lastNameInput" name="lastName" required>
      </div>

      <div class="input-field">
        <label for="birthInput">Geboortedatum:</label>
        <input type="date" id="birthInput" name="birthDate" required>
      </div>

      <button name="submit">Toevoegen</button>
    </div>
  </form>

  <table id="jongerenTable">
    <thead>
      <tr>
        <th class="th20">id</th>
        <th class="th20">Achternaam</th>
        <th class="th20">Voornaam</th>
        <th class="th20">Geboortedatum</th>
        <th class="th20">Actie</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once '../../src/personen/jongeren.class.php';

      echo Jongere::DisplayJongeren($pdo)
      ?>
    </tbody>
  </table>

</body>

</html>