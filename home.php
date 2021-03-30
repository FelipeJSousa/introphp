<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Welcome to Finance Portal</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="signup-form">
    <form action="home.php" method="post" enctype="multipart/form-data">
		<h2>Bem-vindo</h2>
        <br>

            <?php
				session_start();
				include 'database.php';
				$Id= $_SESSION["Id"];
				$sql=mysqli_query($conn,"SELECT * FROM USUARIOS where Id='$Id' ");
				$row  = mysqli_fetch_array($sql);
            ?>
            
		<p class="hint-text"><br><b>Bem-vindo </b><?php echo $_SESSION["Primeiro_nome"] ?> <?php echo $_SESSION["Ultimo_nome"] ?></p>
        <div class="text-center">Deseja sair desta página? <br><a href="logout.php">Logout</a></div>
    </form>
	
</div>
</body>
</html>