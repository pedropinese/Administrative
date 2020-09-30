<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('location: ../login.php');
    exit();
}

require_once './Customer.php';
require_once '../Address/Address.php';

$idCustomer = $_POST["id"];

$customer = new Customer();
$custDetail = $customer->getById($idCustomer);

$address = new Address();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cliente - Detalhes</title>
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
            <h3 class="page-header">Detalhes Cliente</h3>
            <div class="row">
                <div class="col-md-6">
                    <h4>Dados</h4>
                    <table class="table table-bordered table-striped table-dark">
                        <tbody>
                            <tr>
                                <th>Nome</th>
                                <td><?= $custDetail->NAME ?></td>
                            </tr>
                            <tr>
                                <th>Telefone</th>
                                <td><?= $custDetail->PHONE ?></td>
                            </tr>
                            <tr>
                                <th>Data de Nascimento</th>
                                <td><?= $custDetail->BIRTHDAY ?></td>
                            </tr>
                            <tr>
                                <th>CPF</th>
                                <td><?= $custDetail->CPF ?></td>
                            </tr>
                            <tr>
                                <th>RG</th>
                                <td><?= $custDetail->RG ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <h4>Endereços</h4>
                    <table class="table table-bordered table-striped table-dark">
                        <thead>
                            <tr>
                                <th>Rua</th>
                                <th>Nº</th>
                                <th>CEP</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>País</th>
                            </tr>
                        </thead>
                        <?php
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
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class=" pull-left">
                <a href="list.php" class="btn btn-default">Voltar</a>
            </div>
        </div><!-- /main -->
    </div>
</body>
</html>