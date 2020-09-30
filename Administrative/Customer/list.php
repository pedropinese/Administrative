<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('location: ../login.php');
    exit();
}
ob_start();

//carrega automaticamente as classes dos obj instanciados aqui
function __autoload($class) {
    require_once './' . $class . '.php';
}
require_once '../class/DB.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cliente - Lista</title>
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
                    <h2>Clientes</h2>
                </div>
                <div class="col-sm-7"></div>
                <div class="col-sm-2">
                    <a href="../Customer/create.php" class="btn btn-success h2 pull-right">Novo Cliente</a>
                </div>
            </div>
            <hr/>
            <!-- listCustomer -->
            <div id="list" class="row">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Data de Nascimento</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Endereço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <?php
                    $customer = new Customer();
                    foreach ($customer->getAll() as $key => $value):
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $value->NAME; ?></td>
                                <td><?php echo $value->PHONE; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($value->BIRTHDAY)); ?></td>
                                <td><?php echo $value->CPF; ?></td>
                                <td><?php echo $value->RG; ?></td>
                                <td>
                                    <form name="address" action="../Address/list.php" method="POST" style="float:left; margin: 0 5px;">
                                        <input type="hidden" name="id" value=<?= $value->ID ?> />
                                        <input type="submit" value="Visualizar" name="address" class="btn btn-light btn-xs"/>
                                    </form>
                                </td>
                                <td class="actions">
                                    <form name="edit" action="edit.php" method="POST" style="float:left; margin: 0 5px;">
                                        <input type="hidden" name="id" value=<?= $value->ID ?> />
                                        <input type="submit" value="Editar" name="edit" class="btn btn-warning btn-xs"/>
                                    </form>
                                    <form name="delete" action="delete.php" method="POST" style="float:left; margin: 0 5px;">
                                        <input type="hidden" name="id" value=<?= $value->ID ?> />
                                        <input type="submit" value="Excluir" name="delete" class="btn btn-danger btn-xs"/>
                                    </form>
                                    <form name="detail" action="detail.php" method="POST" style="float:left; margin: 0 5px;">
                                        <input type="hidden" name="id" value=<?= $value->ID ?> />
                                        <input type="submit" value="Detalhes" name="detail" class="btn btn-info btn-xs"/>
                                    </form>                                
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div><!-- /listCustomer -->
        </div><!-- /main -->
    </div>
</body>
</html>
<?php
ob_end_flush();
?>