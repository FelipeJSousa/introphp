<?php
    require "funcoes.php";
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bem vindo ao nosso projeto!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">
<link rel="stylesheet" href="style/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<?php 
	include 'cabecalho.php'
?>
    <div class="signup-form">
        <form method="post" enctype="multipart/form-data" onsubmit="<?php registros() ?>">
            <h2>Cadastre-se!</h2>
            <p class="hint-text">Crie sua conta</p>
            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="Nome" placeholder="Nome" required="required"></div>
                    <div class="col"><input type="text" class="form-control" name="Sobrenome" placeholder="Sobrenome" required="required"></div>
                </div>        	
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="Email" placeholder="E-mail" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="Senha" placeholder="Senha" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="csenha" placeholder="Confirme a senha" required="required">
            </div>
            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> Eu aceito os <a href="#">Termos de uso</a> & <a href="#">Politica de privacidade</a></label>
            </div>
            <div class="form-group">
                <button type="submit" name="Confirmar" class="btn btn-success btn-lg btn-block">Registrar agora</button>
            </div>
            <div class="text-center">Ja tem uma conta? <a href="login.php">Entrar</a><br/></div>
        </form>
        <?php 
        echo $GLOBALS["ErroRegister"];
        $GLOBALS["ErroRegister"] = "";
        ?>
    </div>
    <?php 
	include 'rodape.php'
    ?>
</body>
</html>