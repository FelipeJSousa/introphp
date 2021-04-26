<?php

    function database(){
        $url='localhost';
        $username='sysdba';
        $password='123sys123dba';
        $conn=mysqli_connect($url,$username,$password,"piloto");
        if(!$conn){
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            exit();
            // die('Could not Connect My Sql:' .mysql_error());
        }
        return $conn;
    }

    function loginProcess(){
        session_start();
        if(isset($_POST['email']))
        {
            extract($_POST);
            include 'database.php';
            $sql=mysqli_query($conn,"SELECT * FROM usuario where Email='$email' and Senha='$senha'");
            
            $row  = mysqli_fetch_array($sql);
            if(is_array($row))
            {
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
    }

    function verificaLogin(){
        session_start();
        $conn = database();
        $IDUsuario = $_SESSION["IDUsuario"];
        $sql = mysqli_query($conn,"SELECT * FROM usuario where IDUsuario='$IDUsuario' ");
        $row = mysqli_fetch_array($sql);
        if($row["Nome"] == ''){
            header ("Location: login.php");
        };
    }



?>