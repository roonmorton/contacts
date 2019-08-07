<?php
if(isset($_POST)){
    session_start();
	if(isset($_POST["login"])){
		if($_POST["login"] == "in"){
			//require_once("/var/www/localhost/htdocs/MisContactos.com/models/Contact.php");
			require_once("C:/xampp2/htdocs/contacts/contacts/models/User.php");

  			$user = new User();
  			/*
$id,
		$names,
		$lastName,
		$phone,
		$email,
		$birthday
  			*/
  			$user->set(
  				$_POST["username"],
  				$_POST["password"]
  			);

              if($user->find())
              {
                  $_SESSION["user"] = $user;
                  echo '<script>alert("Usuario validado...");window.location.href = "/contacts/contacts/"; </script>';
              }
  			else
  				echo '<script>alert("Usuario/contraseña incorrecta...");window.location.href = "/contacts/contacts/login.php"; </script>';
  				
		}
	}
	elseif (isset($_POST["logout"])){
		if($_POST["logout"] == "out"){
            unset($_SESSION["user"]);
            header('Location: '.'/contacts/contacts/');
		}
	}
}else{
    header('Location: '.'/contacts/contacts/');
}

?>