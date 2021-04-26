<?php
  echo'<div class="vertical-menu">';
  include 'funcoes.php';
  $conn = database();
  $resp = mysqli_query($conn, 'SELECT * FROM Conteudos');
  
  while($row = mysqli_fetch_array($resp)){
    $url = 'pages/'.str_replace(" ",'',$row['Nome']).'.php';
    $uri = str_replace($url, '', $_SERVER['REQUEST_URI']);
    $active = strpos($uri, $url) === false ? "" : 'class="active"';
    echo '<a '. $active .'href="'.$url.'">'.$row['Nome'].'</a>';
  }
  echo '</div>';
?>