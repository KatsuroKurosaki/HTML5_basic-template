<?php

namespace Db;

class DbConnection extends DbClass {
	//instacia
	static $_instance;
	
	//Conexion con la BD
	private $conn;
	
	/*
	* constructor de la clase
	*/
	public function __construct(){
		$this->checkConnection();
	}
	
	public function __destruct(){ }
	
	/*Evitamos el clonaje del objeto. Patrón Singleton*/
    private function __clone(){ }

    /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
    public static function getInstance(){
      if (!self::$_instance instanceof self){
         self::$_instance = new self();
      }
      return self::$_instance;
    }
	
	/**
	* createConnection Crea la conexion en utf8 con la bd
	*/
	private function createConnection(){
		$this->conn = @new \Mysqli(	DbConf::DB_SERVER, 
									DbConf::DB_USER,
									DbConf::DB_PASS,
									DbConf::DB_BD,
									DbConf::DB_PORT);
		
		if( !isset( $this->conn ) || $this->conn->connect_errno ){
			throw new DbErrorConnection($this->conn);
		}else{
			$this->conn->query("SET collation_connection = utf8_unicode_ci; SET NAMES utf8;");
		}
	}
	
	/**
	* checkConnection Comprueba la conexion con la bd y si no existe la crea
	*/
	private function checkConnection(){
		if( $this->conn == null || !mysqli_ping( $this->conn )){
			$this->createConnection();
		}
	}
	
	/**
	* getConnection devuelve la conexion con la bd
	* @return object conexion con la bd
	*/
	public function getConnection(){
		return $this->conn;
	}
	
	public static function execute( String $sql, string $param_type = "", array $a_bind_params = [] ){
		return parent::executeSql(
			self::getInstance()->getConnection(),
			$sql, 
			$param_type, 
			$a_bind_params
		);
	}
	
}

?>