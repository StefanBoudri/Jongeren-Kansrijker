<?php

require_once __DIR__ . '/../dbconnect.php';

class Instituut
{
    //Properties van instituut object
    public $id;
    public $institute;
    public $city;
    public $address;

    private PDO $mypdo;
        
    static $tableName = "instituten";

    public function __construct(PDO $pdo)
    {
        $this->mypdo = $pdo;
    }

    //Functie om gegevens toe te voegen / wijzigen
    public function Save(): void
    {
        if($this->id > 0) {
            $statement = $this->mypdo->prepare("UPDATE " . self::$tableName . " SET institute = :institute, city = :city, address = :address WHERE id = :id");
            $statement->execute([':id' => $this->id, ':institute' => $this->institute, ':city' => $this->city, ':address' => $this->address]);
        } else {
            $statement = $this->mypdo->prepare("INSERT INTO " . self::$tableName . " (id, institute, city, address) VALUES (:id, :institute, :city, :address)");
            $statement->execute([':id' => $this->id, ':institute' => $this->institute, ':city' => $this->city, ':address' => $this->address]);
        }
    }
        
    //Functie om activiteit te verwijderen
    public function Delete($id): void
    {
        $statement = $this->mypdo->prepare("DELETE FROM " . self::$tableName . " WHERE id = :id");
        $statement->execute([':id' => $id]);
    }

    //Functie om jongeren uit database op te halen en te sorteren op achternaam
    public static function GetInstituten(PDO $pdo): array
    {
        $statement = $pdo->prepare("SELECT * FROM " . self::$tableName . " ORDER BY institute");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Functie om activiteiten weer te geven in tabel
    public static function DisplayInstituten(PDO $pdo) : string
    {
        $result = self::GetInstituten($pdo);

        $html = '';

        foreach ($result as $row)
        {
            $html .= '<tr>';
            $html .= '<td>' . $row["institute"] . '</td>';
            $html .= '<td>' . $row["city"] . '</td>';
            $html .= '<td>' . $row["address"] . '</td>';
            $html .= '<td>';
            $html .= '<a href="edit.php?id=' . $row["id"] . '">Wijzigen</a> | ';
            $html .= '<a href="../../src/instituten/instituten.process.php?id=' . $row["id"] . '">Verwijderen</a>';
            $html .= '</td>';
            $html .= '</tr>';
        }
            
        return $html;
    }
}

?>