<?php

namespace Db;

/**
*
* Esta clase controla la conexion de bd para las metricas
*
**/
class DbConnection extends DbClass
{
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
	
	public function __destruct() { }
	
	/*Evitamos el clonaje del objeto. Patrón Singleton*/
    private function __clone(){ }

    /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
    public static function getInstance(){
      if ( !( self::$_instance instanceof self ) )
	  {
         self::$_instance = new self();
      }
      return self::$_instance;
    }
	
	/**
	* createConnection Crea la conexion en utf8 con la bd
	*/
	private function createConnection(){
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		$this->conn = mysqli_init();
		$this->conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, DbConf::DB_TIMEOUT);
		try{
			$this->conn->real_connect( DbConf::DB_SERVER, 
											DbConf::DB_USER,
											DbConf::DB_PASS,
											null,
											DbConf::DB_PORT);
		}catch( DbErrorConnection $e ){ throw new \Db\DbErrorConnection( $this->conn, "" );  }
		catch( \Error $e ){ throw new \Db\DbErrorConnection( $this->conn, "" );  }
		catch( \Exception $e ){ throw new \Db\DbErrorConnection( $this->conn, "" );  }
		
		if( !isset( $this->conn ) or $this->conn == null ){
			throw new \Exception( "Error BD ", -10 );
		}else{
			$this->conn->query( "SET NAMES ".DbConf::DB_CHARSET.";" );
			$this->conn->query( "SET collation_connection = ".DbConf::DB_COLLATION.";" );
		}
	}
	
	/**
	* checkConnection Comprueba la conexion con la bd y si no existe la crea
	*/
	private function checkConnection()
	{
		if( $this->conn == null ){ $this->createConnection(); }
		elseif ( !mysqli_ping( $this->conn ) ){ $this->createConnection(); }
	}
	
	/**
	* getConnection devuelve la conexion con la bd
	* @return object conexion con la bd
	*/
	public function getConnection(){ return $this->conn; }
	
	public static function execute( String $sql, string $param_type = "", array $a_bind_params = [] ){
	
		return parent::executeSql( 
						self::getInstance()->getConnection(),
						 $sql, 
						 $param_type, 
						 $a_bind_params );
	}
	
	public static function executeBulk( String $sql, string $param_type = "", array $list = [] ){
		return parent::executeSqlBulk( 
						self::getInstance()->getConnection(),
						$sql, 
						$param_type,
						$list );
	}
	
	public static function executeLongdata( String $sql, $param_type = "", array $a_bind_params = [], String $file_path ){
		
		return parent::executeSqlLongdata( 
						self::getInstance()->getConnection(),
						 $sql, 
						 $param_type, 
						 $a_bind_params,
						 $file_path );
	}
	
}

?>