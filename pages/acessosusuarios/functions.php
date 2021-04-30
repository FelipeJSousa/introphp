<?php

    if(isset($_POST['function']) && !empty($_POST['function'])) {
        $function = $_POST['function'];
        switch($function) {
            case 'functionSave' : functionSave();break;
        }
    }

function functionSave(){
    session_start();
    if(isset($_POST['email']))
    {
        extract($_POST);
        $conn = database();
        $sql = mysqli_query($conn,"SELECT u.*,g.NomeGrupo FROM usuario u
inner join GrupoDeAcesso g on g.IDGrupo = u.IDGrupo where Email='$email' and Senha='$senha'");

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

function listarGruposAcesso(){
        include_once  '../../funcoes.php';
        $Conn = database();
        $resp = mysqli_query($Conn,'select * from GrupoDeAcesso');
        $listGrupoAcesso = [];
        while ( $row = mysqli_fetch_array($resp) ) {
            array_push($listGrupoAcesso, (object)array(
                                            "IDGrupo"=>$row["IDGrupo"],
                                            "NomeGrupo"=>$row["NomeGrupo"]
                                        ));
        }
        return $listGrupoAcesso;
    }

    function listarUsuarios(){
        include_once  '../../funcoes.php';
        $Conn = database();
        $resp = mysqli_query($Conn,'select us.*,NomeGrupo from usuario us left join GrupoDeAcesso ga on (ga.IDGrupo = us.IDGrupo)');
        $listUsuarios = [];
        while ( $row = mysqli_fetch_array($resp) ) {
            array_push($listUsuarios,(object)array(
                                    "IDUsuario"=>$row['IDUsuario'],
                                    "Nome"=>$row['Nome'],
                                    "Sobrenome"=>$row['Sobrenome'],
                                    "Email"=>$row['Email'],
                                    "IDGrupo"=>$row['IDGrupo'],
                                    "NomeGrupo"=>$row['NomeGrupo']
                             ));
        }
        return $listUsuarios;
    }

?>