<?php
	$page = "home";
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
<link rel="stylesheet" href="../../style/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
	<?php 
		include_once '../../cabecalho.php';
	?>
<div class="signup-form page">
	<?php
		include_once '../../menu.php';
        include_once '../../funcoes.php';
        verificaLogin($page);
	?>
	
    <form action="home.php" method="post" enctype="multipart/form-data">
		<h2>Bem-vindo</h2>
        <br>
        <?php
            print_r($Conteudos[$page]);
        ?>

            
		<p class="hint-text"><br><b>Bem-vindo </b><?php echo $_SESSION["Nome"] ?> <?php echo $_SESSION["Sobrenome"] ?></p>
        <div class="text-center">Deseja sair desta página? <br><a href="../../logout.php">Logout</a></div>
    </form>
	
	
</div>
<?php 
	include_once '../../rodape.php';
?>
</body>
</html>
