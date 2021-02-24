<?php

namespace MongoDb;

class MongoDb
{
	// Instance
	static $_instance;

	// DB connexion
	private $conn;

	public function __construct()
	{
		$this->checkConnection();
	}

	public function __destruct()
	{
	}

	private function __clone()
	{
	}

	public static function getInstance()
	{
		if (!self::$_instance instanceof self) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

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
			return true;
		} catch (\Exception $e) {
			//var_dump($e);
			return false;
		}
	}

	private function checkConnection()
	{
		if ($this->conn == null) {
			$this->createConnection();
			try {
				$command = new \MongoDB\Driver\Command(['ping' => 1]);
				$cursor = $this->conn->executeCommand('admin', $command);
				// The ping command returns a single result document, so we need to access the first result in the cursor.
				$cursor->toArray();
				return true;
			} catch (\Exception $e) {
				//var_dump($e);
				return false;
			}
		}
	}

	public function getConnection()
	{
		return $this->conn;
	}

	/**
	 * DB queries
	 */
	public static function find(String $collection, array $filter, array $options = [])
	{
		try {
			$query = new \MongoDB\Driver\Query($filter, $options);
			$cursor = self::getInstance()->getConnection()->executeQuery(MongoConf::DB_DDBB . '.' . $collection, $query);
			unset($query);
			return $cursor->toArray();
		} catch (\Exception $e) {
			//var_dump($e);
			return false;
		}
	}

	public static function insert(String $collection, array $data)
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

	public static function update(String $collection, array $filter, array $data)
	{
		try {
			$bulk = new \MongoDB\Driver\BulkWrite();
			foreach ($data as $k => $v) {
				$bulk->update($filter, $data);
			}
			self::getInstance()->getConnection()->executeBulkWrite(MongoConf::DB_DDBB . '.' . $collection, $bulk);
			unset($bulk);
		} catch (\Exception $e) {
			//print_r($e);
			return false;
		}
		return true;
	}

	public static function delete(String $collection, array $filter)
	{
		try {
			$bulk = new \MongoDB\Driver\BulkWrite();
			foreach ($filter as $k => $v) {
				$bulk->delete($v);
			}
			self::getInstance()->getConnection()->executeBulkWrite(MongoConf::DB_DDBB . '.' . $collection, $bulk);
			unset($bulk);
		} catch (\Exception $e) {
			//print_r($e);
			return false;
		}
		return true;
	}
}
