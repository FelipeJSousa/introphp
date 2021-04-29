<?php
    $page = "acessos usuarios";

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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    include_once '../../cabecalho.php';
?>
<div class="page">
    <?php
        include_once '../../menu.php';
        include_once '../../funcoes.php';
        verificaLogin($page);
    ?>
    <?php
//    print_r($Conteudos[$page]);
    ?>
    <div class="main-content">
        <div>
            <table id="tbGrupoAcesso">
                <thead>
                <tr>
                    <th>Id Usuario</th>
                    <th>Nome</th>
                    <th>Sobreome</th>
                    <th>Email</th>
                    <th>Grupo Acesso</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    include_once 'functions.php';
                    $listGrupoAcesso = listarGruposAcesso();
                    $listUsuario = listarUsuarios();
                    foreach ( $listUsuario as $usuario){
                        echo '<tr><td>'.$usuario->IDUsuario.'</td>';
                        echo '<td>'.$usuario->Nome.'</td>';
                        echo '<td>'.$usuario->Sobrenome.'</td>';
                        echo '<td>'.$usuario->Email.'</td>';
                        echo '<td>'.$usuario->NomeGrupo.'</td></tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>
        
    <div class="text-center">Deseja sair desta página? <br><a href="../../logout.php">Logout</a></div>
    </div>
    <?php

    ?>


</div>
<?php
include_once '../../rodape.php';
?>
</body>
</html>
