<?php

namespace MongoDB;

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
	{
	}

	/*Evitamos el clonaje del objeto. Patrón Singleton*/
	private function __clone()
	{
	}

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

	/**
	 * delete
	 *
	 * @param  mixed $collection coleccion a la que se quiere acceder
	 * @param  mixed $filter  filtro para eliminar
	 *
	 * @return void Elimina los registros que coinciden con el indice
	 */
	public static function delete(String $collection, array $filter)
	{
		try {
			$bulk = new \MongoDB\Driver\BulkWrite();
			$bulk->delete($filter);
			self::getInstance()->getConnection()->executeBulkWrite(MongoConf::DB_DDBB . '.' . $collection, $bulk);
			unset($bulk);
		} catch (\Exception $e) {
			print_r($e);
			return false;
		}
		return true;
	}

	/**
	 * update
	 *
	 * @param  mixed $collection coleccion a la que se quiere acceder
	 * @param  mixed $filter filtro para actualizar los registros
	 * @param  mixed $data data a actualizar
	 *
	 * @return void
	 */
	public static function update(String $collection, array $filter, array $data)
	{
		try {
			$bulk = new \MongoDB\Driver\BulkWrite();
			$bulk->update($filter, $data);
			self::getInstance()->getConnection()->executeBulkWrite(MongoConf::DB_DDBB . '.' . $collection, $bulk);
			unset($bulk);
		} catch (\Exception $e) {
			//print_r($e);
			return false;
		}
		return true;
	}

	/**
	 * find
	 *
	 * @param  mixed $collection
	 * @param  mixed $filter. Aqui se filtran los datos
	 *               ["type"=>"LABEL_SENDED","userId"=>1]
	 * @param  mixed $options para mostrar solo ciertos datos, limites, ... 
	 * 				["projection" => ["date"=>"1"], "sort" => ["date" => -1], "limit" => 5, "skip" => 2 ]
	 *
	 * @return void
	 */
	public static function find(String $collection, array $filter, array $options = array())
	{

		try {
			if (count($options) > 0) {
				$projection = ['projection' => $options];
			}
			$query = new \MongoDB\Driver\Query($filter, $options);
			$cursor = self::getInstance()->getConnection()->executeQuery(MongoConf::DB_DDBB . '.' . $collection, $query);
			//$query = new \MongoDB\Driver\Query(["type"=>"LABEL_SENDED","userId"=>1], ['projection' => ["date"=>"1"] ]);
			//$cursor = self::getInstance()->getConnection()->executeQuery('allergen.beta', $query);
			unset($query);
			return $cursor->toArray();
		} catch (\Exception $e) {
			//var_dump($e);
			return null;
		}
	}

	/**
	 * command
	 *
	 * @param  mixed $collection
	 * @param  mixed $command comando a ajecutar
	 * 				 ejemplo 'count'
	 * @param  mixed $filter filtro a buscar
	 * 						["type"=>"LABEL_SENDED","label.Id"=>511]
	 *
	 * @return void ejemplo ['count' => $collection,  'query' => ["type"=>"LABEL_SENDED","label.Id"=>511]
	 */
	public static function command(String $collection, string $command, array $filter = array())
	{
		try {

			$query = new \MongoDB\Driver\Command([$command => $collection, 'query' => $filter]);
			$cursor = self::getInstance()->getConnection()->executeCommand(MongoConf::DB_DDBB, $query);
			unset($query);
			return $cursor->toArray();
		} catch (\Exception $e) {
			//print_r($e);
			return null;
		}
	}
}
