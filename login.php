<?php 
session_start();
if(isset($_SESSION['user'])){
    header('Location: '.'/contacts/contacts/index.php');
}else{
    echo "no hay usuario";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="res/bulma.min.css">
</head>

<body class="">
    <section class="section has-background-dark">
        <nav class="level">
        </nav>
    </section>
    <section class="section ">
        <div class="container">
            <div class="columns is-mobile">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <div class="card has-background-light">
                        <header class="card-header has-background-">
                            <p class="card-header-title has-text-whitee">
                                Iniciar Sesión
                            </p>
                            <a href="#" class="card-header-icon" aria-label="more options">
                                <span class="icon">
          <i class="fas fa-angle-down" aria-hidden="true"></i>
        </span>
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <br>
                                <form method="post" action="core/LoginController.php">
                                <input class="input" type="hidden" name="login" value="in">
                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal">
                                            <label class="label">Usuario</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <p class="control">
                                                    <input class="input is-rounded is-medium" type="text" placeholder="" autofocus name="username">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal ">
                                            <label class="label">Contraseña</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <p class="control ">
                                                    <input class="input is-rounded is-medium" type="password" placeholder="" name="password">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="columns is-mobile">
                                        <div class="column is-half is-offset-one-quarter">
                                            <button class="button is-primary is-medium is-rounded is-fullwidth">Ingresar</button>
                                        </div>
                                    </div>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
    </section>
</body>
</html>