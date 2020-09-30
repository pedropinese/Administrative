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

$idCustomer = $_POST["customerId"];
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
        <title>Endereço - Adicionar</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <!-- Mask -->
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/jquery.mask.min.js" type="text/javascript"></script>

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
        <div class="container-fluid">
            <h3 class="page-header">Adicionar Endereço</h3>
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="control-label col-md-2">Rua:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="street" 
                               placeholder="Ex.: Rua Abc"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Nº:</label>
                    <div class="col-md-4">
                        <input type="number" 
                               class="form-control" 
                               name="number" 
                               placeholder="Ex.: 123"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">CEP:</label>
                    <div class="col-md-4">
                        <input id="postalCode"
                               name="postalCode"
                               type="text"
                               class="form-control"
                               placeholder="Ex.: 00000-000">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Bairro:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="district" 
                               placeholder="Ex.: Centro"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Cidade:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="city" 
                               placeholder="Ex.: Piracicaba"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Estado:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="state" 
                               placeholder="Ex.: São Paulo"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">País:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="country" 
                               placeholder="Ex.: Brasil"
                               required="required">
                    </div>
                </div>
                <div>
                    <input type="hidden" class="form-control" name="customerId" value=<?= $idCustomer ?>>
                </div>
                <div class="col-md-6 pull-right">
                    <input type="submit" name="createAddress" value="Salvar" class="btn btn-primary" />
                </div>
            </form>
            <form name="back" action="list.php" method="POST" >
                <input type="hidden" name="id" value=<?= $idCustomer ?> />
                <button onclick="javascript: backToList()" class="btn btn-default">Voltar</button>
            </form>
            <?php
            //INSERE NOVOS ENDEREÇO
            $address = new Address();
            if (isset($_POST['createAddress'])):
                $street = $_POST['street'];
                $number = $_POST['number'];
                $postalCode = $_POST['postalCode'];
                $district = $_POST['district'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $country = $_POST['country'];
                $customerId = $_POST['customerId'];

                $address->setStreet($street);
                $address->setNumber($number);
                $address->setPostalCode($postalCode);
                $address->setDistrict($district);
                $address->setCity($city);
                $address->setState($state);
                $address->setCountry($country);
                $address->setCustomerId($customerId);

                if ($address->create()) {
                    ?>
                    <script type="text/javascript">
                        backToList();
                    </script>
                    <?php
                } else {
                    echo'Erro ao cadastrar endereço!';
                }
            endif;
            ?>
        </div><!-- /main -->
        <script type="text/javascript">
            $("#postalCode").mask("00000-000");
        </script>
    </body>
</html>