<?php
namespace Session;

class SessionDb implements \SessionHandlerInterface {
	private $sessionexpire;
	private $sessiontable;
	
	public function __construct($sessionexpire,$sessiontable) {
		// START SESSION
		//session_set_save_handler(new \Session\SessionDb(SessionConf::SESSION_EXPIRE,SessionConf::SESSION_TABLE),true);
		//session_start(['use_cookies'=>0,'use_only_cookies'=>0,'use_trans_sid'=>1,'name'=>'s']);
		//
		// END SESSION
		//session_destroy();
		$this->sessionexpire = $sessionexpire;
		$this->sessiontable = $sessiontable;
	}
	
	public function create_sid(){
		return bin2hex(random_bytes(16));
	}
    
    public function open($savePath, $sessionName) {
		try{
			 \Db\DbWifiConn::execute("SELECT true FROM `".$this->sessiontable."` LIMIT 1");
			 return true;
		} catch(\Db\DbErrorConnection $e){
			return false;
		}
    }
	
    public function close() {
		// DB Connections are persistent
		return true;
    }
	
    public function read($id) {
		$result = \Db\DbWifiConn::execute("SELECT `data` FROM `".$this->sessiontable."` WHERE `id` = ? AND `expires` > UNIX_TIMESTAMP(NOW());",
			's',
			[ $id ]
		);
		$data = $result->getSingleData();
		if($data==NULL){
			return "";
		} else {
			return $data['data'];
		}
    }
	
    public function write($id, $data) {
		try {
			\Db\DbWifiConn::execute("INSERT INTO `".$this->sessiontable."` (`id`, `data`, `expires`)
			VALUES (?,?,UNIX_TIMESTAMP(DATE_ADD(NOW(),INTERVAL ".$this->sessionexpire.")))
			ON DUPLICATE KEY UPDATE `data` = ?, `expires` = UNIX_TIMESTAMP(DATE_ADD(NOW(),INTERVAL ".$this->sessionexpire."));",
				'sss',
				[ $id,$data,$data ]
			);
			return true;
		} catch (\Db\DbErrorStatement $e) {
			return false;
		}
    }
	
    public function destroy($id) {
		\Db\DbWifiConn::execute("DELETE FROM `".$this->sessiontable."` WHERE `id` = ?;",
			's',
			[ $id ]
		);
		return true;
    }
	
    public function gc($maxlifetime) {
		\Db\DbWifiConn::execute("DELETE FROM `".$this->sessiontable."` WHERE `expires` < UNIX_TIMESTAMP(NOW());");
		return true;
    }
}
?>