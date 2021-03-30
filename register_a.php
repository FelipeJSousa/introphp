<?php
    extract($_POST);
    print_r($_POST);
    require("database.php");
    $sql=mysqli_query($conn,"SELECT * FROM Usuarios where Email='$Email'");
    if(mysqli_num_rows($sql)>0)
    {
        echo "Email Já existe"; 
        exit;
    }
    
    if(isset($_POST['Primeiro_nome']))
    {   
        echo "'$Primeiro_nome', '$Ultimo_nome', '$Email', 'md5($Senha)'";
        $consulta = "INSERT INTO Usuarios(Primeiro_nome, Ultimo_nome, Email, Senha) VALUES ('$Primeiro_nome', '$Ultimo_nome', '$Email', '$Senha')";
        $sql=mysqli_query($conn,$consulta) or die("Não foi possivel gravar os dados!");
        header ("Location: login.php?status=success");
    }
    else{
        echo "Passou";
    }

?>