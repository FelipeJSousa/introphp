<?php
  echo'<div class="vertical-menu">';
  include 'funcoes.php';
  $conn = database();
  $Conteudo = mysqli_query($conn, 'SELECT * FROM Conteudos');
  
  $uri = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], 'pages/'));  
  while($ConteudoRow = mysqli_fetch_array($Conteudo)){
    $url = 'pages/'.str_replace(" ",'',$ConteudoRow['Nome']).'.php';
    $active = strpos($_SERVER['REQUEST_URI'], $url) === false ? "" : 'class="active"';
    echo '<a '. $active .'href="'.$uri.$url.'">'.$ConteudoRow['Nome'].'</a>';
  }
  echo '</div>';
?>