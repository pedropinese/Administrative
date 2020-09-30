<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrativo - KaBuM!</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon"/>
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body" style="background-image: url('./img/bg.jpg');">
            <div class="container has-text-centered box">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-dark">Sistema Administrativo</h3>
                    <h3 class="title has-text-dark"><a href="https://www.kabum.com.br" target="_blank">KaBuM!</a></h3>
                    <div class="box hero.is-success">
                        <form action="process.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="userName" name="text" class="input is-large" placeholder="Usuário" autofocus="" required="required">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="password" class="input is-large" type="password" placeholder="Senha" required="required">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>