<?php
//require_once("/var/www/localhost/htdocs/MisContactos.com/core/MySQL.php");
require_once("C:/xampp2/htdocs/contacts/contacts/core/MySQL.php");


class Contact{
	public $id;
	public $names;
	public $lastName;
	public $phone;
	public $email;
	public $birthday;
	private $db;

	function __construct(){
		$this->db = new MySQL();
		$this->birthday = null;
		$this->id = 0;
	}

	public function set (
		$id,
		$names,
		$lastName,
		$phone,
		$email,
		$birthday
	){
		$this->id = $id;
		$this->names = $names;
		$this->lastName = $lastName;
		$this->phone = $phone;
		$this->email = $email;
		$this->birthday = $birthday;
		//$this->ip = $_SERVER["HTTP_CLIENT_IP"];
	}


	public function add(){
		$res = true;
		$query = "";
		if($this->id  == "0" ){
			$query ="INSERT INTO TBL_Contacto(nombres,apellidos,telefono,mail,fechaNacimiento) values('$this->names','$this->lastName','$this->phone','$this->email','$this->birthday');";
		
		}else{
			$query = "UPDATE TBL_Contacto SET nombres = '$this->names', apellidos = '$this->lastName', telefono = '$this->phone', mail = '$this->email', fechaNacimiento='$this->birthday' WHERE idUsuario = '$this->id'";

		}
		if(!$this->db->query($query))
			$res = false;
		return $res;
	}

	public function delete(){
		$query = "DELETE FROM TBL_Contacto WHERE idContacto = $this->id";
		return $this->db->query($query);

	}

	public function list(){
		$query = 'SELECT * FROM TBL_Contacto ORDER BY idContacto DESC';
		return $this->db->queryResult($query);

	}

	public function find(){
		$query = "SELECT * FROM TBL_Contacto WHERE idUsuario = $this->id";
		$result = $this->db->queryResult($query)[0];
		$this->names = $result["nombres"];
		$this->lastName = $result["apellidos"];
		$this->phone = $result["telefono"];
		$this->email = $result["mail"];
		$this->birthday = $result["create_time"];
	}

	public function __destroy(){
        $this->db->close();
    }

}

?>

