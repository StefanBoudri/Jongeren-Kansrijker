<?php

require_once 'personen.class.php';

class Medewerker extends Persoon
{
    //Properties van medewerker object
    public $role;
    public $inService;
    
    static $tableName = "medewerkers";

    //Functie om gegevens toe te voegen / wijzigen
    public function Save(): void
    {
        if($this->id > 0) {
            $statement = $this->mypdo->prepare("UPDATE " . self::$tableName . " SET firstName = :firstName, lastName = :lastName, birthDate = :birthDate , role = :role, inService = :inService WHERE id = :id");
            $statement->execute([':id' => $this->id, ':firstName' => $this->firstName, ':lastName' => $this->lastName, ':birthDate' => $this->birthDate, ':role' => $this->role, ':inService' => $this->inService]);
        } else {
            $statement = $this->mypdo->prepare("INSERT INTO " . self::$tableName . " (id, firstName, lastName, birthDate, role, inService) VALUES (:id, :firstName, :lastName, :birthDate, :role, :inService)");
            $statement->execute([':id' => $this->id, ':firstName' => $this->firstName, ':lastName' => $this->lastName, ':birthDate' => $this->birthDate, ':role' => $this->role, ':inService' => $this->inService]);
        }
    }

    //Functie om object te verwijderen uit database
    public function Delete($id): void
    {
        $statement = $this->mypdo->prepare("DELETE FROM " . self::$tableName . " WHERE id = :id");
        $statement->execute([':id' => $id]);
    }
        
    //Functie om medewerkers uit database op te halen en te sorteren op achternaam
    public static function getMedewerkers(PDO $pdo): array
    {
        $statement = $pdo->prepare("SELECT * FROM " . self::$tableName . " ORDER BY lastName");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Functie om medewerkers weer te geven in tabel
    public static function DisplayMedewerkers(PDO $pdo) : string
    {
        $result = self::getMedewerkers($pdo);

        $html = '';

        foreach ($result as $row)
        {
            $html .= '<tr>';
            $html .= '<td>' . $row["id"] . '</td>';
            $html .= '<td>' . $row["lastName"] . '</td>';
            $html .= '<td>' . $row["firstName"] . '</td>';
            $html .= '<td>' . date('d-m-Y', strtotime($row["birthDate"])) . '</td>';
            $html .= '<td>' . $row["role"] . '</td>';
            $html .= '<td>' . date('d-m-Y', strtotime($row["inService"])) . '</td>';
            $html .= '<td>';
            $html .= '<a href="edit.php?id=' . $row["id"] . '">Wijzigen</a> | ';
            $html .= '<a href="../../src/personen/medewerkers.process.php?id=' . $row["id"] . '">Verwijderen</a>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        
        return $html;
    }
}
?>
