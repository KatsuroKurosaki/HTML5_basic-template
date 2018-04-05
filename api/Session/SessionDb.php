<?php
namespace Session;

class SessionDb implements \SessionHandlerInterface, \SessionUpdateTimestampHandlerInterface {
	private array $_sessionOptions;
	
	// Constructor. I like this array procedure like jQuery plugins.
	public function __construct(array $options=array()) {
		$_settings = array_replace_recursive(array(
			"dbtable"=>SessionConf::SESSION_TABLE,
			"expires"=>SessionConf::SESSION_EXPIRE,
			"sidlen"=>SessionConf::SESSION_BYTESLEN
		),$options);
		
		$this->_sessionOptions = $_settings;
	}
	
	// return value should be true for success or false for failure
	public function close() {
		// DB Connections are persistent
		return true;
    }
	
	// return value should be true for success or false for failure
	public function destroy(string $session_id) {
		try {
			\Db\DbConnection::execute(
				"DELETE FROM `".$this->_sessionOptions['dbtable']."`
				WHERE `id` = ?;",
				's',
				[ $session_id ]
			);
			return true;
		} catch(\Db\DbErrorConnection $e){
			return false;
		}
    }
	
	// return value should be true for success or false for failure
	public function gc(int $maxlifetime) {
		try {
			\Db\DbConnection::execute(
				"DELETE FROM `".$this->_sessionOptions['dbtable']."`
				WHERE `expires` < UNIX_TIMESTAMP(NOW());"
			);
			return true;
		} catch(\Db\DbErrorConnection $e){
			return false;
		}
    }
	
	// return value should be true for success or false for failure
	public function open(string $save_path, string $session_name) {
		try {
			 \Db\DbConnection::execute(
				"SELECT true
				FROM `".$this->_sessionOptions['dbtable']."`
				LIMIT 1;"
			);
			 return true;
		} catch(\Db\DbErrorConnection $e){
			return false;
		}
    }
	
	// return value should be the session data or an empty string
	public function read(string $session_id) {
		try {
			$data = \Db\DbConnection::execute(
				"SELECT `data`
				FROM `".$this->_sessionOptions['dbtable']."`
				WHERE `id` = ? AND `expires` > UNIX_TIMESTAMP(NOW());",
				's',
				[ $session_id ]
			)->getSingleData();
			
			return ($data!=NULL)?$data['data']:"";
		} catch(\Db\DbErrorConnection $e){
			return false;
		}
    }
	
	// return value should be true for success or false for failure
	public function write(string $session_id, string $session_data) {
		try {
			\Db\DbConnection::execute(
				"INSERT INTO `".$this->_sessionOptions['dbtable']."` (`id`, `data`, `expires`)
				VALUES (?,?,UNIX_TIMESTAMP(DATE_ADD(NOW(),INTERVAL ".$this->_sessionOptions['expires'].")))
				ON DUPLICATE KEY UPDATE `data` = ?, `expires` = UNIX_TIMESTAMP(DATE_ADD(NOW(),INTERVAL ".$this->_sessionOptions['expires']."));",
				'sss',
				[ $session_id,$session_data,$session_data ]
			);
			return true;
		} catch (\Db\DbErrorStatement $e) {
			return false;
		}
    }
	
	// invoked internally when a new session id is needed
	public function create_sid(){
		return bin2hex(random_bytes($this->_sessionOptions['sidlen']));
	}
    
    // return value should be true if the session id is valid otherwise false
	public function validateId(string $session_id){
		#WIP
		return true;
	}
	
	// return value should be true for success or false for failure
	public function updateTimestamp(string $session_id, string $session_data){
		#WIP
		return true
	}

}
?>