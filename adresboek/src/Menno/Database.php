<?php
/**
 * Created by PhpStorm.
 * User: Menno
 * Date: 07/02/2017
 * Time: 09:48
 */

namespace Menno;


class Database {

    public static $connection;
    public static $database;

    public function __construct($hostname, $username, $password, $database)
    {

        // onthouden welke database er gekozen wordt
        self::$database = $database;

        # Verbinding maken
        $this->connect($hostname, $username, $password, $database);
    }

    public static function run($query)
    {
        if (!$result = mysqli_query(self::$connection, $query)) {
            throw new \RuntimeException('Query execution failed: "' . $query . '", because ' . mysqli_error(self::$connection), 1);
        }

        return $result;
    }

    private function connect($hostname, $username, $password, $database)
    {

        # Database-verbinding maken
        if (!self::$connection = mysqli_connect($hostname, $username, $password, $database)) {
            die('Kon geen verbinding maken met database');
        }
    }

    public static function escape($input = '')
    {
        if ($input === null) {
            return null;
        }
        if ($input && !strlen($input)) {
            return '';
        }
        return mysqli_real_escape_string(self::$connection, $input);
    }

    public static function insert($table, $data = false)
    {
        if ($data === false) {
            $data = $_POST[$table];
        }
        $keys = array();
        $values = array();
        if (is_array($data)) {
            foreach ($data as $veld => $waarde) {
                $keys[] = sprintf('`%s`', $veld);

                // als de waarde leeg is dan komt er "null" in de database
                if ($waarde === null) {
                    $values[] = 'null';

                // als er een nummerieke waarde is dan wordt de waarde niet ge 'escaped'
                } elseif (is_numeric($waarde)) {
                    $values[] = sprintf("'%s'", $waarde);

                // anders wordt de waarde wel gescaped
                } else {
                    $values[] = sprintf("'%s'", self::escape($waarde));
                }
            }
        }
        $query = sprintf("insert into `%s` (%s) values (%s) ", $table, join(',', $keys), join(',', $values));
        $result = self::run($query);

        // geef de laatste id terug
        $new_id = mysqli_insert_id(self::$connection);

        return $new_id;
    }

    public static function update($table, $data, $where) {
        //voor elke waarde in de data array wordt een update uitgevoerd
        foreach ($data as $veld => $waarde){
            $set = $veld . " = '".$waarde."'";
            $query = sprintf("update `%s` set %s where id = %s", $table, $set, $where);
            return self::run($query);
        }
        return true;
    }

    public static function delete($table, $id) {
        $query = sprintf("delete from %s where id = %d limit 1 ", $table, $id);
        return self::run($query);
    }

    public static function getById($table, $id=false) {
        if (!$id || empty($id)) {
            return false;
        }
        $query = sprintf('select * from %s where id = %d', $table, $id);
        $result = self::select($query);
        return $result;
    }

    public static function select($query) {

        // als er een item wordt gevraagd zorgen we dat er een object teruggergeven wordt
        $limit_is_1 = preg_match('/limit\s+1$/', trim($query));

        if ($limit_is_1) {
            $result = self::run($query);
            $item = mysqli_fetch_object($result);
            return $item;
        }

        //anders worden er meerdere objecten meegegeven aan een array
        $result = self::run($query);

        $items = array();
        while ($item = mysqli_fetch_object($result)) {
            $items[] = $item;
        }
        return $items;
    }
}