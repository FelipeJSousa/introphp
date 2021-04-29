<?php
    session_start();
    include 'funcoes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bem vindo ao nosso projeto!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<?php 
	include 'cabecalho.php';
?>
<div class="signup-form">
    <form method="post" enctype="multipart/form-data" onsubmit="<?php loginProcess() ?>">
		<h2>Login</h2>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="senha" placeholder="Password" required="required">
        </div>
        </br>
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Login</button>
        </div>
        <div class="text-center">Não possui conta? <a href="register.php">Crie uma conta aqui</a></div>
    </form>
    <?php
        echo $GLOBALS["ErroForms"];
        $GLOBALS["ErroForms"] = "";
    ?>

</div>
<?php 
	include 'rodape.php'
?>
</body>
</html>