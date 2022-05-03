<?php

class Conf {

    private static $host = "localhost";
    private static $dbname = "Projet";
    private static $user = "root";
    private static $password = "";

    public static function get($field): string {
        switch ($field) {
            case "host": return self::$host; break;
            case "dbname": return self::$dbname; break;
            case "user": return self::$user; break;
            case "password": return self::$password; break;
            default: throw new InvalidArgumentException("field $field doesn't exists"); break;
        }
    }

    public static function show_tables(): void {
        require_once "Connexion.php";

        $query = Connexion::getPdo() -> query("SHOW TABLES");
        $array = $query -> fetchAll(PDO::FETCH_COLUMN);

        echo "<div style='margin: 16px;'>";
        foreach($array as $key => $value) {
            echo "<div style='display: flex; flex-direction: row;'><div style='background-color: #a4a4a4; display: flex; flex-direction: column; border: black 1px solid; padding: 8px;'>$key</div><div style='display: flex; flex-direction: column; border: black 1px solid; padding: 8px; width: 128px;'>$value</div></div>";
        }
        echo "</div>";
    }
}
?>