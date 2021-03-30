<?php
    extract($_POST);
    require("database.php");
    $sql=mysqli_query($conn,"SELECT * FROM Usuarios where Email='$Email'");
    if(mysqli_num_rows($sql)>0)
    {
        echo "Email Já existe"; 
        exit;
    }
    
    if(isset($_POST['save']))
    {        
        $consulta = "INSERT INTO Usuarios(Primeiro_nome, Ultimo_nome, Email, Senha) VALUES ('$Primeiro_nome', '$Ultimo_nome', '$Email', 'md5($Senha)')";
        $sql=mysqli_query($conn,$consulta) or die("Não foi possivel gravar os dados!");
        header ("Location: login.php?status=success");
    }

?>