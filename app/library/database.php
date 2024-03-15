<?php
class DataBase
{
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $db = 'framework';
    private $door = '3306';
    private $dbh;
    private $stmt;

    public function __construct()
    {
        //data source or DSN contains the information needed to connect to the database
        $dns = 'mysql:host=' . $this->host . ';port=' . $this->door . ';dbname=' . $this->db;

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

    //preare statements with query
    public function query($sql)
    {
        //prepare a sql query
        $this->stmt = $this->dbh->prepare($sql);
    }

    //binds a value to a parameter
    public function bind($parameter, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }

    //execute prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    // get a single record
    public function result()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //get a record group
    public function results()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //returns the number of rows affected by the last SQL statement
    public function totalresults()
    {
        return $this->stmt->rowCount();
    }

    //returns the last ID entered into the database
    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}