<?php 
session_start();
if(isset($_SESSION['user'])){
    //echo "si hay usuario";
    //unset($_SESSION["user"]);
}else{
    header('Location: '.'/contacts/contacts/login.php');
}

define('ROOT', dirname(__FILE__));
if(isset($_POST)){
    if(isset($_POST["edit"])){
    if($_POST["edit"] == "1"){
    //require_once("/var/www/localhost/htdocs/MisContactos.com/models/Contact.php");
    require_once("C:/xampp2/htdocs/contacts/contacts/models/Contact.php");

            $contact = new Contact();
            $contact->id = $_POST["pID"];
            $contact->find();
        }
    }
}
//var_dump($_SERVER["HTTP_X_FORWARDED_FOR"]);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mis Contactos - UMG</title>
        <link rel="stylesheet" href="res/bulma.min.css">
    </head>

    <body>
        <section class="section has-background-dark">
            <nav class="level">
                <h1 class="level-item has-text-centered title has-text-white">
      Mis Contactos - UMG

    </h1>
<div>
<form method="post" action="core/LoginController.php">
                                <input class="input" type="hidden" name="logout" value="out">
                                    <div class="field is-horizontal">
                                    <button type="submit" class="button is-danger is-rounded">Salir</button>

                                    </form>
</div>
            </nav>
        </section>

        <section class="section has-background-">
            <div class="container">

                <div class="card ">
                    <header class="card-header has-background-light">
                        <p class="card-header-title has-text-whitee">
                            Nuevo Contacto
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                            <span class="icon">
          <i class="fas fa-angle-down" aria-hidden="true"></i>
        </span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="content">

                            <form method="post" action="core/ContactController.php">
                                <input class="input" type="hidden" name="pID" value="<?php echo isset($contact) ? $contact->id : '0'; ?>">
                                <input class="input" type="hidden" name="add" value="1">

                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Nombres *</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control is-expanded has-icons-left ">
                                                <input class="input is-medium is-rounded" type="text" placeholder="Tu nombre" name="pName" autofocus required="" value="<?php echo isset($contact) ? $contact->names : ''; ?>">
                                                <!--<span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>-->
                                            </p>
                                        </div>
                                        <div class="field">
                                            <p class="control is-expanded has-icons-left has-icons-right">
                                                <input class="input is-medium is-rounded" type="text" name="pLastName" placeholder="Tu apellido" value="<?php echo isset($contact) ? $contact->lastName : ''; ?>">
                                                <!--<span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>-->
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Teléfono *</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field is-expanded">
                                            <div class="field has-addons">
                                                <p class="control">
                                                    <a class="button is-static is-medium is-rounded">
              +502
            </a>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input class="input is-medium is-rounded" type="tel" placeholder="Tu numero de Telefono" name="pPhone" required="" value="<?php echo isset($contact) ? $contact->phone : ''; ?>">
                                                </p>
                                            </div>
                                            <!-- <p class="help">Do not enter the first zero</p>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Correo</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-medium is-rounded" type="email" placeholder="Tu correo electronico" name="pEmail" value="<?php echo isset($contact) ? $contact->email : ''; ?>">
                                            </div>
                                            <!--<p class="help is-danger">
          This field is required
        </p>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Fecha Nacimiento *</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field is-narrow">
                                            <p class="control is-expanded has-icons-left has-icons-right">
                                                <input class="input is-medium is-rounded" type="date" name="pBirtday" placeholder="" required="" value="<?php echo isset($contact) ? date("Y-m-d", strtotime($contact->birthday)) : '2000-01-01'; ?>">
                                                <!--<span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>-->
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label is-normal"></div>
                                    <div class="field-body">
                                        <div class="field">
                                            <button type="submit" class="button is-link is-rounded is-medium">Finalizar</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <br>

                <div class="card">
                    <header class="card-header has-background-light">
                        <p class="card-header-title has-text-whitee">
                            Contactos
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                            <span class="icon">
          <i class="fas fa-angle-down" aria-hidden="true"></i>
        </span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="content">
<?php
//echo dirname(__FILE__);
  require_once(ROOT ."/models/Contact.php");
  $contact = new Contact();
  $contacts = $contact->list();

?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><abbr title="ID">ID</abbr></th>
                                            <th><abbr title="Nombres">Nombres</th>
        <th><abbr title="Telefono">Telefono</abbr></th>
                                            <th><abbr title="Email">Correo</abbr></th>
                                            <th><abbr title="Cumplea;os">Fecha Nacimiento</abbr></th>
                                            <th><abbr title="Fecha Agregado">Agregado </abbr></th>
                                            <td></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($contacts as $value){ ?>
                                            <tr>
                                                <th>
                                                    <?php echo $value["idContacto"]; ?>
                                                </th>
                                                <td>
                                                    <?php echo $value["nombres"] . " " . $value["apellidos"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value["telefono"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value["mail"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo date("d-m-Y", strtotime($value["fechaNacimiento"])); ?>
                                                </td>
                                                <td>
                                                    <?php echo date("d-m-Y H:i:s", strtotime($value["create_time"])); ?>
                                                </td>

                                                <td>
                                                    <div class="buttons has-addons">
                                                        <form method="post" action="core/ContactController.php">
                                                            <input type="hidden" name="pID" value="<?php echo $value['idUsuario']; ?>">
                                                            <input class="input" type="hidden" name="del" value="1">
                                                            <button type="submit" class="is-small button is-danger " onclick="return confirm('Esta seguro de borrar?');"> Eliminar</button>
                                                        </form>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="pID" value="<?php echo $value['idUsuario']; ?>">
                                                            <input class="input" type="hidden" name="edit" value="1">
                                                            <button type="submit" class="is-small button is-info "> Actualizar</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </body>

    </html>