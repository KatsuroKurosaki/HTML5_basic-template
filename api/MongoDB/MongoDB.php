<?php

namespace Db;

class MongoDB
{
    //instacia
    static $_instance;

    //Conexion con la BD
    private $conn;

    /*
     * constructor de la clase
     */
    public function __construct()
    {
        $this->checkConnection();
    }

    public function __destruct()
    {}

    /*Evitamos el clonaje del objeto. Patrón Singleton*/
    private function __clone()
    {}

    /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
    public static function getInstance()
    {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * createConnection Crea la conexion en utf8 con la bd
     */
    private function createConnection()
    {
        try {
            $this->conn = new \MongoDB\Driver\Manager(
                "mongodb://" . MongoConf::DB_HOST . "/" . MongoConf::DB_AUTH,
                [
                    "username" => MongoConf::DB_USER,
                    "password" => MongoConf::DB_PASS,
                    "connectTimeoutMS" => MongoConf::DB_TIMEOUT,
                ]
            );
        } catch (\Exception $e) {
            //throw new DbErrorConnection($this->conn);
            //var_dump($e);
        }
    }

    /**
     * checkConnection Comprueba la conexion con la bd y si no existe la crea
     */
    private function checkConnection()
    {
        if ($this->conn == null) {
            $this->createConnection();
            $command = new \MongoDB\Driver\Command(['ping' => 1]);

            try {
                $cursor = $this->conn->executeCommand('admin', $command);
                /* The ping command returns a single result document, so we need to access the
                 * first result in the cursor. */
                $cursor->toArray();
            } catch (\Exception $e) {
                //$this->createConnection();
                //var_dump($e);
            }
        }
    }

    /**
     * getConnection devuelve la conexion con la bd
     * @return object conexion con la bd
     */
    public function getConnection()
    {
        return $this->conn;
    }

    /**
     * DB queries
     */
    public static function insert(String $collection, array $data)
    {
        try {
            $bulk = new \MongoDB\Driver\BulkWrite();
            $bulk->insert($data);
            self::getInstance()->getConnection()->executeBulkWrite(MongoConf::DB_DDBB . '.' . $collection, $bulk);
            unset($bulk);
        } catch (\Exception $e) {
            //var_dump($e);
            return false;
        }
        return true;
    }

    public static function bulkInsert(String $collection, array $data)
    {
        try {
            $bulk = new \MongoDB\Driver\BulkWrite();
            foreach ($data as $k => $v) {
                $bulk->insert($v);
            }
            self::getInstance()->getConnection()->executeBulkWrite(MongoConf::DB_DDBB . '.' . $collection, $bulk);
            unset($bulk);
        } catch (\Exception $e) {
            //var_dump($e);
            return false;
        }
        return true;
    }

    public static function query(String $collection, array $filter, array $queryOptions = array())
    {
        /*
        Loop example
        foreach ($cursor as $document) {
        var_dump($document);
        var_dump((array) $document);
        }
         */
        try {
            $query = new \MongoDB\Driver\Query($filter, $queryOptions);
            $cursor = $manager->executeQuery(MongoConf::DB_DDBB . '.' . $collection, $query);
            unset($query);
            return $cursor->toArray();
        } catch (\Exception $e) {
            //var_dump($e);
            return null;
        }
    }

}
