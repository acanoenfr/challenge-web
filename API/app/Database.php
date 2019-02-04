<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 04/02/2019
 * Time: 12:06
 */

namespace App;


class Database
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * Database constructor.
     *
     * @param $host
     * @param $dbname
     * @param $user
     * @param $pass
     * @param bool $debug
     */
    public function __construct($host, $dbname, $user, $pass, $debug = false)
    {
        try {
            $this->db = new \PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
            $this->db->setAttribute(\PDO::ATTR_CASE, \PDO::CASE_LOWER);
            $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            if ($debug) {
                die ($e->getMessage());
            } else {
                die ("There are an error with the SQL Database, please contact an administrator !");
            }
        }
    }

    /**
     * Get a PDO object
     *
     * @return \PDO
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Execute SQL statement
     *
     * @param $stmt
     * @param array $attr
     * @return array|bool
     */
    public function query($stmt, array $attr = [])
    {
        $req = $this->db->prepare($stmt);
        $res = $req->execute($attr);
        if (strpos("INSERT", $stmt) === 0 && strpos("UPDATE", $stmt) === 0 && strpos("DELETE", $stmt) === 0) {
            return $res;
        }
        return $req->fetchAll();
    }

    /**
     * Get ID from the last message inserted
     *
     * @return string
     */
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}
