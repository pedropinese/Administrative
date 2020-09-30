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

$idCustomer = $_POST["id"];
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Endereço - Lista</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
            <div id="top" class="row">
                <div class="col-sm-2">
                    <h2>Endereço</h2>
                </div>
                <div class="col-sm-7"></div>
                <div class="col-sm-2">
                    <form name="create" action="create.php" method="POST" style="float:left; margin: 0 5px;">
                        <input type="hidden" name="customerId" value=<?= $idCustomer ?> />
                        <input type="submit" value="Novo Endereço" name="create" class="btn btn-success h2 pull-right"/>
                    </form>
                </div>
            </div>
            <hr/>
            <!-- listAddress -->
            <div id="list" class="row">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Rua</th>
                            <th>Nº</th>
                            <th>CEP</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>País</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <?php
                    $address = new Address();
                    foreach ($address->getByCustomerId($idCustomer) as $key => $value):
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $value->STREET; ?></td>
                                <td><?php echo $value->NUMBER; ?></td>
                                <td><?php echo $value->POSTAL_CODE; ?></td>
                                <td><?php echo $value->DISTRICT; ?></td>
                                <td><?php echo $value->CITY; ?></td>
                                <td><?php echo $value->STATE; ?></td>
                                <td><?php echo $value->COUNTRY; ?></td>
                                <td class="actions">
                                    <form name="edit" action="edit.php" method="POST" style="float:left; margin: 0 5px;">
                                        <input type="hidden" name="id" value=<?= $value->ID ?> />
                                        <input type="submit" value="Editar" name="edit" class="btn btn-warning btn-xs"/>
                                    </form>
                                    <form name="delete" action="delete.php" method="POST" style="float:left; margin: 0 5px;">
                                        <input type="hidden" name="id" value=<?= $value->ID ?> />
                                        <input type="submit" value="Excluir" name="delete" class="btn btn-danger btn-xs"/>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div><!-- /listCustomer -->
            <a href="../Customer/list.php" class="btn btn-default">Voltar</a>
        </div><!-- /main -->
    </div>
</body>
</html>