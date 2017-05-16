<?php
class SessionDb implements SessionHandlerInterface {
    private $link;
	private $host;
	private $user;
	private $pass;
	private $ddbb;
	private $sessionexpire;
	private $sessiontable;
	
	public function __construct($host,$user,$pass,$ddbb,$sessionexpire,$sessiontable) {
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->ddbb = $ddbb;
		$this->sessionexpire = $sessionexpire;
		$this->sessiontable = $sessiontable;
	}
    
    public function open($savePath, $sessionName) {
        $this->link = @new MySQLi($this->host, $this->user, $this->pass, $this->ddbb);
        return ($this->link->connect_errno==0);
    }
	
    public function close() {
        if($this->link->connect_errno==0){
			$this->link->close();
			return true;
		} else {
			return false;
		}
    }
	
    public function read($id) {
		$stmt = $this->link->prepare("SELECT `data` FROM `".$this->sessiontable."` WHERE `id` = ? AND `expires` > UNIX_TIMESTAMP(NOW());");
		if($stmt === false){die($this->link->error);}
		$stmt->bind_param('s',
			$id
		);
		$stmt->execute();
		if($stmt->error){die($stmt->error);}
		$data = $stmt->get_result()->fetch_assoc();
		$stmt->close();
		unset($stmt);
		if($data==NULL){
			return "";
		} else {
			return $data['data'];
		}
    }
	
    public function write($id, $data) {
		$stmt = $this->link->prepare("INSERT INTO `".$this->sessiontable."` (`id`, `data`, `expires`) VALUES (?,?,UNIX_TIMESTAMP(DATE_ADD(NOW(),INTERVAL ".$this->sessionexpire."))) ON DUPLICATE KEY UPDATE `data` = ?, `expires` = UNIX_TIMESTAMP(DATE_ADD(NOW(),INTERVAL ".$this->sessionexpire."));");
		//if($stmt === false){die($this->link->error);}
		if($stmt === false){return false;}
		$stmt->bind_param('sss',
			$id,
			$data,
			$data
		);
		$stmt->execute();
		//if($stmt->error){die($stmt->error);}
		if($stmt->error){return false;}
		$stmt->close();
		unset($stmt);
		return true;
    }
	
    public function destroy($id) {
		$stmt = $this->link->prepare("DELETE FROM `".$this->sessiontable."` WHERE `id` = ?;");
		//if($stmt === false){die($this->link->error);}
		if($stmt === false){return false;}
		$stmt->bind_param('s',
			$id
		);
		$stmt->execute();
		//if($stmt->error){die($stmt->error);}
		if($stmt->error){return false;}
		$stmt->close();
		unset($stmt);
		return true;
    }
	
    public function gc($maxlifetime) {
		$stmt = $this->link->prepare("DELETE FROM `".$this->sessiontable."` WHERE `expires` < UNIX_TIMESTAMP(NOW());");
		//if($stmt === false){die($this->link->error);}
		if($stmt === false){return false;}
		$stmt->execute();
		//if($stmt->error){die($stmt->error);}
		if($stmt->error){return false;}
		$stmt->close();
		unset($stmt);
		return true;
    }
}

session_set_save_handler(new SessionDb(Conf::DB_HOST,Conf::DB_USER,Conf::DB_PASS,Conf::DB_DDBB,Conf::SESSION_EXPIRE,Conf::SESSION_TABLE),true);
?>