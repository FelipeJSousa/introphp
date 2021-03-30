<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM USUARIOS where Email='$email' and Senha='md5($senha)'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        echo "<script>Usuario encontrado;</script>";
        $_SESSION["Id"] = $row['Id'];
        $_SESSION["Email"]=$row['Email'];
        $_SESSION["Primeiro_nome"]=$row['Primeiro_nome'];
        $_SESSION["Ultimo_nome"]=$row['Ultimo_nome']; 
        header("Location: home.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>