<?php
session_start();
if(isset($_POST['email']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM usuario where Email='$email' and Senha='$senha'");
    
    $row  = mysqli_fetch_array($sql);
    print_r($row);
    if(is_array($row))
    {
        echo "<script>Usuario encontrado;</script>";
        $_SESSION["IDUsuario"] = $row['IDUsuario'];
        $_SESSION["Email"]=$row['Email'];
        $_SESSION["Nome"]=$row['Nome'];
        $_SESSION["Sobrenome"]=$row['Sobrenome']; 
        header("Location: home.php"); 
    }
    else
    {
           
        echo "<script>
        alert('E-mail ou senha incorreta');
        window.location.href='login.php';
        </script>";
  
    }
}
?>