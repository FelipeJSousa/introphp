<?php
  echo'<div class="vertical-menu">';
  include 'database.php';
  $resp = mysqli_query($conn, 'SELECT * FROM Conteudos');
  
  while($row = mysqli_fetch_array($resp)){
    $url = $row['Nome'] == "home" ? str_replace(" ",'',$row['Nome']).'.php' : 'pages/'.str_replace(" ",'',$row['Nome']).'.php';
    $uri = $_SERVER['REQUEST_URI'];
    $active = strpos($uri, $url) === false ? "" : 'class="active"';
    echo '<a '. $active .'href="'.$url.'">'.$row['Nome'].'</a>';
  }
  echo '</div>';


?>