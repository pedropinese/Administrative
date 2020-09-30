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
$adrsToEdit = $address->getById($_POST["id"]);
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
        <title>Endereço - Editar</title>

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
            <h3 class="page-header">Editar Endereço</h3>
            <form name="edir" class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="control-label col-md-2">Rua:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="street" 
                               placeholder="Ex.: Rua Abc"
                               required="required"
                               value="<?= $adrsToEdit->STREET; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Nº:</label>
                    <div class="col-md-4">
                        <input type="number" 
                               class="form-control" 
                               name="number" 
                               placeholder="Ex.: 123"
                               required="required"
                               value="<?= $adrsToEdit->NUMBER; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">CEP:</label>
                    <div class="col-md-4">
                        <input id="postalCode"
                               name="postalCode"
                               type="text"
                               class="form-control"
                               placeholder="Ex.: 00000-000"
                               value="<?= $adrsToEdit->POSTAL_CODE; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Bairro:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="district" 
                               placeholder="Ex.: Centro"
                               required="required"
                               value="<?= $adrsToEdit->DISTRICT; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Cidade:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="city" 
                               placeholder="Ex.: Piracicaba"
                               required="required"
                               value="<?= $adrsToEdit->CITY; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Estado:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="state" 
                               placeholder="Ex.: São Paulo"
                               required="required"
                               value="<?= $adrsToEdit->STATE; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">País:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="country" 
                               placeholder="Ex.: Brasil"
                               required="required"
                               value="<?= $adrsToEdit->COUNTRY; ?>">
                    </div>
                </div>
                <div class="col-md-6 pull-right">
                    <input type="hidden" name="id" value="<?= $adrsToEdit->ID ?>"/>
                    <input type="submit" name="update" value="Salvar" class="btn btn-primary" />
                </div>
            </form>
            <form name="back" action="list.php" method="POST" >
                <input type="hidden" name="id" value=<?= $adrsToEdit->CUSTOMER_ID ?> />
                <button onclick="javascript: backToList()" class="btn btn-default">Voltar</button>
            </form>
            <?php
            //PEGA DADOS ATUALIZADOS
            if (isset($_POST['update'])):
                $id = $_POST["id"];
                $street = $_POST['street'];
                $number = $_POST['number'];
                $postalCode = $_POST['postalCode'];
                $district = $_POST['district'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $country = $_POST['country'];

                $address->setStreet($street);
                $address->setNumber($number);
                $address->setPostalCode($postalCode);
                $address->setDistrict($district);
                $address->setCity($city);
                $address->setState($state);
                $address->setCountry($country);

                if ($address->update($id)) {
                    ?>
                    <script type="text/javascript">
                        backToList();
                    </script>
                    <?php
                } else {
                     echo'Erro ao atualizar endereço';
                }
            endif;
            ?>
        </div><!-- /main -->

    </div>

</body>
</html>

