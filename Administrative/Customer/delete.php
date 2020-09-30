<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('location: ../login.php');
    exit();
}

//carrega automaticamente as classes dos obj instanciados aqui
function __autoload($class) {
    require_once './' . $class . '.php';
}

$customer = new Customer();
$custToDelete = $customer->getById($_POST["id"]);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cliente - Excluir</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        
        <link href="../css/site.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
        <nav class="navbar navbar-color navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand label-btn" href="../index.php">Administrativo</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../logout.php" class="label-btn">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main -->
        <div class="container">
            <h3 class="page-header">Excluir Cliente</h3>
            <h4>Você tem certeza que deseja excluir este cliente?</h4>
            <form name = "deleteCustomerForm" method = "post">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Nome</th>
                            <td><?= $custToDelete->NAME ?></td>
                        </tr>
                        <tr>
                            <th>Telefone</th>
                            <td><?= $custToDelete->PHONE ?></td>
                        </tr>
                        <tr>
                            <th>Data de Nascimento</th>
                            <td><?= $custToDelete->BIRTHDAY ?></td>
                        </tr>
                        <tr>
                            <th>CPF</th>
                            <td><?= $custToDelete->CPF ?></td>
                        </tr>
                        <tr>
                            <th>RG</th>
                            <td><?= $custToDelete->RG ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class=" pull-right">
                    <a href="list.php" class="btn btn-default">Voltar</a>
                    <input type="submit" name="deleteCustomer" value="Excluir" class="btn btn-danger" />
                    <input type="hidden" name="id" value="<?= $custToDelete->ID ?>"/>
                </div>
            </form>
        </div><!-- /main -->
        <?php
        if (isset($_POST['deleteCustomer'])):
            $id = $_POST['id'];
            if ($customer->delete($id)) {
                echo'Cliente excluido!';
            } else {
                echo'Erro ao excluir cliente!';
            }
        endif
        ?>
    </div>
</body>
</html>
