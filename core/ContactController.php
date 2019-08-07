<?php
if(isset($_POST)){
	session_start();
	if(isset($_POST["add"])){
		if($_POST["add"] == "1"){
			//require_once("/var/www/localhost/htdocs/MisContactos.com/models/Contact.php");
			require_once("C:/xampp2/htdocs/contacts/contacts/models/Contact.php");

  			$contact = new Contact();
  			/*
$id,
		$names,
		$lastName,
		$phone,
		$email,
		$birthday
  			*/
  			$contact->set(
  				$_POST["pID"],
  				$_POST["pName"],
  				$_POST["pLastName"],
  				$_POST["pPhone"],
  				$_POST["pEmail"],
  				$_POST["pBirtday"]
  			);

  			if($contact->add())
  				echo '<script>alert("Contacto agregado Correctamente...");window.location.href = "/contacts/contacts/"; </script>';
  			else
  				echo '<script>alert("Ocurrio un error, intentalo mas tarde");window.location.href = "/contacts/contacts/"; </script>';
  				
		}
	}
	elseif (isset($_POST["del"])){
		if($_POST["del"] == "1"){
			//require_once("/var/www/localhost/htdocs/MisContactos.com/models/Contact.php");
			require_once("C:/xampp2/htdocs/contacts/contacts/models/Contact.php");
  			$contact = new Contact();
  			$contact->id = $_POST["pID"];

  			if($contact->delete())
  				echo '<script>alert("Contacto eliminado Correctamente...");window.location.href = "/contacts/contacts/"; </script>';
  			else
  				echo '<script>alert("Ocurrio un error, intentalo mas tarde");window.location.href = "/contacts/contacts/"; </script>';
		}
	}
}else{
    header('Location: '.'/contacts/contacts/');
}

?>