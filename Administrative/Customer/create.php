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
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cliente - Adicionar</title>
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
            <h3 class="page-header">Adicionar Cliente</h3>
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="control-label col-md-2">Nome:</label>
                    <div class="col-md-4">
                        <input type="text" 
                               class="form-control" 
                               name="name" 
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Telefone:</label>
                    <div class="col-md-4">
                        <input id="phone" 
                               name="phone"
                               type="text" 
                               class="form-control"
                               placeholder="Ex.: (00) 000000000"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">Data de Nascimento:</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="birthday">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">CPF:</label>
                    <div class="col-md-4">
                        <input id="cpf" 
                               name="cpf"
                               type="text" 
                               class="form-control"
                               placeholder="Ex.: 000.000.000-00"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">RG:</label>
                    <div class="col-md-4">
                        <input id="rg" 
                               name="rg"
                               type="text" 
                               class="form-control"
                               placeholder="Ex.: 00.000.000-0"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 pull-right">
                        <a href="list.php" class="btn btn-default">Voltar</a>
                        <input type="submit" name="create" value="Salvar" class="btn btn-primary" />
                    </div>
                </div>
            </form>


            <?php
            //INSERE NOVOS CLIENTES
            $customer = new Customer();
            if (isset($_POST['create'])):
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $birthday = $_POST['birthday'];
                $cpf = $_POST['cpf'];
                $rg = $_POST['rg'];

                $customer->setName($name);
                $customer->setPhone($phone);
                $customer->setBirthday($birthday);
                $customer->setCPF($cpf);
                $customer->setRG($rg);

                if ($customer->create()) {
                    echo'cadastrar cliente!';
                } else {
                    echo'Erro ao cadastrar cliente!';
                }
            endif;
            ?>
        </div><!-- /main -->
        <script type="text/javascript">
            $("#phone").mask("(00) 000000000");
            $("#cpf").mask("000.000.000-00");
            $("#rg").mask("00.000.000-A");
        </script>
    </body>
</html>
<?php
ob_end_flush();
?>