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
            $conn = database();
            $sql = mysqli_query($conn,"SELECT u.*,g.NomeGrupo FROM usuario u
                                             inner join GrupoDeAcesso g on g.IDGrupo = u.IDGrupo 
                                             where Email='$email' and Senha='$senha'");
            
            $row  = mysqli_fetch_array($sql);
            if(is_array($row))
            {
                $_SESSION["IDUsuario"] = $row['IDUsuario'];
                $_SESSION["Email"]=$row['Email'];
                $_SESSION["Nome"]=$row['Nome'];
                $_SESSION["Sobrenome"]=$row['Sobrenome']; 
                $_SESSION["NomeGrupo"]=$row['NomeGrupo'];

                header("Location: pages/home/index.php");
            }
            else
            {    
               $GLOBALS["ErroForms"] = "<script> alert('E-mail ou senha incorreta'); window.location.href='login.php'; </script>";
            }
        }
    }

    function verificaLogin($pagina){
        session_start();
        $conn = database();
        $IDUsuario = $_SESSION["IDUsuario"];
        $sql = mysqli_query($conn,"SELECT * FROM usuario where IDUsuario='$IDUsuario' ");
        $row = mysqli_fetch_array($sql);
        if($row["Nome"] == ''){
            header ("Location: login.php");
        };

        $uricomplete = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $page = substr($uricomplete,strrpos($uricomplete,'/')+1);
        echo "<script>console.log('VerificaLogin: {',
                                    'NomeGrupo: {$_SESSION["NomeGrupo"]}, ',
                                    'pagina: {$pagina} }',
                                    )</script>";

        verificaPermissoes($pagina);
    }

    function verificaPermissoes($pagina){
        session_start();
        $conn = database();
        $uricomplete   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $page = substr($uricomplete,strrpos($uricomplete,'/')+1);
        echo "<script>console.log('VerificaPermissoes: {',
                                    'NomeGrupo: {$_SESSION["NomeGrupo"]}, ',
                                    'pagina: {$pagina} }',
                                    )</script>";

        $query = "SELECT * FROM GrupoDeAcesso GDA
                    INNER JOIN acessoPermitido APE ON APE.IDGrupo_FK = GDA.IDGrupo
                    INNER JOIN Conteudos CON ON CON.ID = APE.IDConteudo_FK
                    WHERE GDA.NomeGrupo = '{$_SESSION["NomeGrupo"]}'
                    AND CON.Nome = '{$pagina}'";
        $result = mysqli_query($conn, $query);
        if($result->num_rows<1){
            $host  = $_SERVER['HTTP_HOST'];
            $uri = substr($uricomplete,0,strrpos($uricomplete,'/'));

            header ("Location: http://{$host}{$uri}/home/index.php");
        }
    }

    function registros(){
        extract($_POST);
        $conn = database();
        $sql=mysqli_query($conn,"SELECT * FROM usuario where Email='$Email'");
        if(mysqli_num_rows($sql)>0)
        {
            $GLOBALS["ErroRegister"]  = "Email Já existe";
            exit();
        }

        if(isset($_POST['Nome']))
        {   
            echo "'$Nome', '$Sobrenome', '$Email', '$Senha'";
            $consulta = "INSERT INTO usuario(Nome, Sobrenome, Email, Senha) VALUES ('$Nome', '$Sobrenome', '$Email', '$Senha')";
            $sql=mysqli_query($conn,$consulta);
            header ("Location: login.php?status=success");
        }
    
    }
?>
