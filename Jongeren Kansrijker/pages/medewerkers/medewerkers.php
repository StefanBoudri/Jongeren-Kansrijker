<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/nav.css">

  <title>Medewerkers</title>
</head>

<body>

  <nav>
    <div class="logo">
      <a href="#">Jongeren Kansrijker</a>
    </div>
    <div class="menu">
      <a href="#">Medewerkers</a>
      <a href="../jongeren/jongeren.php">Jongeren</a>
      <a href="../activiteiten/activiteiten.php">Activiteiten</a>
      <a href="../instituten/instituten.php">Instituten</a>
      <a id="log" href="#">Inloggen / Uitloggen</a>
    </div>
  </nav>

  <h2>Medewerkers</h2>

  <form action="../../src/personen/medewerkers.process.php" method="post">
    <div class="input-group">
      <div class="input-field">
        <label for="activityInput">Voornaam:</label>
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

      <div class="input-field">
        <label for="roleInput">functie:</label>
        <input type="text" id="roleInput" name="role" required>
      </div>

      <div class="input-field">
        <label for="inServiceInput">Ingang dienst:</label>
        <input type="date" id="inServiceInput" name="inService" required>
      </div>

      <button name="submit">Toevoegen</button>
    </div>
  </form>

  <table id="medewerkersTable">
    <thead>
      <tr>
        <th class="thSmall">id</th>
        <th class="thSmall">Achternaam</th>
        <th class="thSmall">Voornaam</th>
        <th class="thSmall">Geboortedatum</th>
        <th class="thSmall">Functie</th>
        <th class="thSmall">In dienst sinds</th>
        <th class="thSmall">Actie</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once '../../src/personen/medewerkers.class.php';
      echo Medewerker::DisplayMedewerkers($pdo)
      ?>  
    </tbody>
  </table>

</body>

</html>
