<?php
//require_once("/var/www/localhost/htdocs/MisContactos.com/core/MySQL.php");
require_once("C:/xampp2/htdocs/contacts/contacts/core/MySQL.php");


class User{
	public $id;
	public $username;
	public $password;

	function __construct(){
		$this->db = new MySQL();
		$this->id = 0;
	}

	public function set (
		$username,
		$password
	){
		$this->username = $username;
		$this->password = $password;
		//$this->ip = $_SERVER["HTTP_CLIENT_IP"];
	}


	public function add(){
		$res = true;
		$query = "";
		if($this->id  == "0" ){
			$query ="INSERT INTO TBL_Usuario(username,password) values('$this->username','$this->password');";
		
		}else{
			$query = "UPDATE TBL_Usuario SET username = '$this->username', password = '$this->password' WHERE idUsuario = '$this->id'";

		}
		if(!$this->db->query($query))
			$res = false;
		return $res;
	}

	public function delete(){
		$query = "DELETE FROM TBL_Usuario WHERE idUsuario = $this->id";
		return $this->db->query($query);

	}

	public function list(){
		$query = 'SELECT * FROM TBL_Usuario ORDER BY idUsuario DESC';
		return $this->db->queryResult($query);

	}

	public function find(){
        $res = false;
		$query = "SELECT * FROM TBL_Usuario WHERE username = '$this->username' AND password = '$this->password'";
		$result = $this->db->queryResult($query);
		//var_dump($result);
        if(count($result) == 1 ){
			$this->id = $result[0]["idUsuario"];
            $this->names = $result[0]["username"];
            $this->lastName = $result[0]["password"];
            $res = true;
        }
        return $res;
	}

	public function __destroy(){
        $this->db->close();
    }
}

?>

