<?php

require_once 'personen.class.php';

class Jongere extends Persoon
{
    static $tableName = "jongeren";

    //Functie om gegevens toe te voegen / wijzigen
    public function Save(): void
    {
        if($this->id > 0) {
            $statement = $this->mypdo->prepare("UPDATE " . self::$tableName . " SET firstName = :firstName, lastName = :lastName, birthDate = :birthDate WHERE id = :id");
            $statement->execute([':id' => $this->id, ':firstName' => $this->firstName, ':lastName' => $this->lastName, ':birthDate' => $this->birthDate]);
        } else {
            $statement = $this->mypdo->prepare("INSERT INTO " . self::$tableName . " (id, firstName, lastName, birthDate) VALUES (:id, :firstName, :lastName, :birthDate)");
            $statement->execute([':id' => $this->id, ':firstName' => $this->firstName, ':lastName' => $this->lastName, ':birthDate' => $this->birthDate]);
        }
    }

    //Functie om jongere te verwijderen uit database
    public function Delete($id): void
    {
        $statement = $this->mypdo->prepare("DELETE FROM " . self::$tableName . " WHERE id = :id");
        $statement->execute([':id' => $id]);
    }

    //Functie om jongeren uit database op te halen en te sorteren op achternaam
    public static function GetJongeren(PDO $pdo): array
    {
        $statement = $pdo->prepare("SELECT * FROM " . self::$tableName . " ORDER BY lastName");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Functie om jongeren weer te geven in tabel
    public static function DisplayJongeren(PDO $pdo) : string
    {
        $result = self::GetJongeren($pdo);

        $html = '<tr>';

        foreach ($result as $row)
        {
            $html .= '<tr>';
            $html .= '<td>' . $row["id"] . '</td>';
            $html .= '<td>' . $row["lastName"] . '</td>';
            $html .= '<td>' . $row["firstName"] . '</td>';
            $html .= '<td>' . date('d-m-Y', strtotime($row["birthDate"])) . '</td>';
            $html .= '<td>';
            $html .= '<a href="edit.php?id=' . $row["id"] . '">Wijzigen</a> | ';
            $html .= '<a href="../../src/personen/jongeren.process.php?id=' . $row["id"] . '">Verwijderen</a>';
            $html .= '</td>';
            $html .= '</tr>';
        }
            
        return $html;
    }
}

?>
