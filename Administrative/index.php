<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('location: ./login.php');
    exit();
}

//carrega automaticamente as classes dos obj instanciados aqui
function __autoload($class) {
    require_once './' . $class . '/' . $class . '.php';
}

$user = new User();
$userLogged = $user->userLogged($_SESSION['userId']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Administrativo - KaBuM!</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/site.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
        <div class="bgInitial">
             <nav class="navbar navbar-color navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand label-btn" href="index.php">Administrativo - KaBuM!</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="label-btn">Olá, <?= $userLogged->USER_NAME ?></a></li>
                        <li><a href="./logout.php" class="label-btn">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main -->
        <div class="container">
            <div class="centralize">
                <h1 class="title">Sistema Administrativo</h1>
            </div>
            <div class="initialBox centralize">
                <div class="row">
                    <br/><br/><br/><br/><br/>
                    <div class="col-md-12">
                        <a href="./Customer/list.php">
                            <div class="btn btn-customer">
                                <img src="./img/customer.png" alt="Clientes" width="110" height="100"/>
                                <h4>Clientes</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /main -->
        </div>
    </div>
</body>
</html>