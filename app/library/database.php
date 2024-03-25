<?php
class DataBase
{
    private $host = DB['HOST'];
    private $user = DB['USER'];
    private $pwd = DB['PASSWORD'];
    private $db = DB['DATABASE'];
    private $door = DB['DOOR'];
    private $dbh;
    private $stmt;

    public function __construct()
    {
        //Data source or DSN contains the information needed to connect to the database
        $dns = 'mysql:host=' . $this->host . ';port=' . $this->door . ';dbname=' . $this->db;

        $options = [
            // Caches the connection to be reused, and avoids the overhead of a new connection, resulting in a faster application
            PDO::ATTR_PERSISTENT => true,
            // Throws a PDOException if an error occurs
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            // Create the PDO instance
            $this->dbh = new PDO($dns, $this->user, $this->pwd, $options);
        } catch (PDOException $e) {
            print "ERROR!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    //Preare statements with query
    public function query($sql)
    {
        //Prepare a sql query
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Binds a value to a parameter
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

    //Execute prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Get a single record
    public function result()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Get a record group
    public function results()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Returns the number of rows affected by the last SQL statement
    public function totalresults()
    {
        return $this->stmt->rowCount();
    }

    //Returns the last ID entered into the database
    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}
