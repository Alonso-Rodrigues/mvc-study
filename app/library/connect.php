<?php
class DataBase
{
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $db = 'framework';
    private $door = '3306';
    private $dbh;

    public function __construct()
    {
        //data source or DSN contains the information needed to connect to the database
        $dns = 'mysql:host' . $this->host . ';port=' . $this->door . ';dbname' . $this->db;
        $options = [
            // caches the connection to be reused, and avoids the overhead of a new connection, resulting in a faster application
            PDO::ATTR_PERSISTENT => true,
            // throws a PDOException if an error occurs
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            // create the PDO instance
            $this->dbh = new PDO($dns, $this->user, $this->pwd, $options);
        } catch (PDOException $e) {
            print "ERROR!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
