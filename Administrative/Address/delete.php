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

$address = new Address();
$adrsToDelete = $address->getById($_POST["id"]);
?>
<script type="text/javascript">
    function backToList() {
        document.forms.back.submit();
    }
</script>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Endereço - Excluir</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>

        <link href="../css/site.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
        <nav class="navbar  navbar-color navbar-fixed-top">
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
            <h3 class="page-header">Excluir Endereço</h3>
            <h4>Você tem certeza que deseja excluir este endereço?</h4>

            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Rua</th>
                        <td><?= $adrsToDelete->STREET ?></td>
                    </tr>
                    <tr>
                        <th>Nº</th>
                        <td><?= $adrsToDelete->NUMBER ?></td>
                    </tr>
                    <tr>
                        <th>CEP</th>
                        <td><?= $adrsToDelete->POSTAL_CODE ?></td>
                    </tr>
                    <tr>
                        <th>Bairro</th>
                        <td><?= $adrsToDelete->DISTRICT ?></td>
                    </tr>
                    <tr>
                        <th>Cidade</th>
                        <td><?= $adrsToDelete->CITY ?></td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td><?= $adrsToDelete->STATE ?></td>
                    </tr>
                    <tr>
                        <th>País</th>
                        <td><?= $adrsToDelete->COUNTRY ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="container">
                <div class="row">
                    <div class="pull-left">
                        <form name="back" action="list.php" method="POST" >
                            <input type="hidden" name="id" value=<?= $adrsToDelete->CUSTOMER_ID ?> />
                            <button onclick="javascript: submitform()" class="btn btn-default">Voltar</button>
                        </form>
                    </div>
                    <div class="pull-right">
                        <form name = "deleteAddressForm" method = "post">
                            <input type="submit" name="deleteAddress" value="Excluir" class="btn btn-danger" />
                            <input type="hidden" name="id" value="<?= $adrsToDelete->ID ?>"/>
                        </form>
                    </div>
                </div>


            </div>

        </div><!-- /main -->
        <?php
        if (isset($_POST['deleteAddress'])):
            $id = $_POST['id'];
            if ($address->deleteAddress($id)) {
                ?>
                <script type="text/javascript">
                    backToList();
                </script>
                <?php
            } else {
                echo'Erro ao excluir endereço!';
            }
        endif
        ?>
    </div>
</body>
</html>
