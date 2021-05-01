<?php
  echo'<div class="vertical-menu">';
  include 'funcoes.php';
  $conn = database();
  session_start();
  $queryResult = mysqli_query($conn, "SELECT Nome, Conteudo FROM GrupoDeAcesso GDA
                                            INNER JOIN acessoPermitido APE ON APE.IDGrupo_FK = GDA.IDGrupo
                                            INNER JOIN Conteudos CON ON CON.ID = APE.IDConteudo_FK
                                            WHERE GDA.NomeGrupo = '{$_SESSION["NomeGrupo"]}'");
  $Conteudos = [];
  $uri = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], 'pages/'));
  while($ConteudoRow = mysqli_fetch_array($queryResult)){
    $url = 'pages/'.str_replace(" ",'',$ConteudoRow['Nome']).'/index.php';
    $active = strpos($_SERVER['REQUEST_URI'], $url) === false ? "" : 'class="active"';
    echo '<a '. $active .'href="'.$uri.$url.'">'.$ConteudoRow['Nome'].'</a>';
    $Conteudos += [$ConteudoRow['Nome'] => $ConteudoRow['Conteudo']];
  }
  echo '</div>';
?>