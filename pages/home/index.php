<?php
	$page = "home";
    include_once '../../layout/master.php';
    top();
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
