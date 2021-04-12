<?php
    extract($_POST);
    print_r($_POST);
    require("database.php");
    $sql=mysqli_query($conn,"SELECT * FROM usuario where Email='$Email'");
    if(mysqli_num_rows($sql)>0)
    {
        echo "Email Já existe"; 
        exit;
    }
    
    if(isset($_POST['Nome']))
    {   
        echo "'$Nome', '$Sobrenome', '$Email', '$Senha'";
        $consulta = "INSERT INTO usuario(Nome, Sobrenome, Email, Senha) VALUES ('$Nome', '$Sobrenome', '$Email', '$Senha')";
        $sql=mysqli_query($conn,$consulta);
        header ("Location: login.php?status=success");
    }
    else{
        echo "Passou";
    }

?>
