<?php

    if(isset($_POST['function']) && !empty($_POST['function'])) {
        $function = $_POST['function'];
        switch($function) {
            case 'functionEditUserGroup' : functionEditUserGroup($_POST['user'],$_POST['group']);break;
        }
    }

function functionEditUserGroup($userid, $groupid){
    include_once  '../../funcoes.php';
    $Conn = database();
    $query = 'update usuario set IDGrupo ='.$groupid.' where IDUsuario='.$userid;
    $resp = mysqli_query($Conn, $query) or die(mysqli_error($Conn));
    if($Conn->query($query) === TRUE){
        $data = array("usuarioid" => $userid, "groupid"=> $groupid);
        header('Content-Type: application/json');
        http_response_code(200);
    }
    else{
        $data = array("erro" => mysqli_error($Conn));
        header('Content-Type: application/json');
        http_response_code(400);
    }
    echo json_encode($data);
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