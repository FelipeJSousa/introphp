<?php
    function listarGruposAcesso(){
        include_once  '../../funcoes.php';
        $Conn = database();
        $resp = mysqli_query($Conn,'select * from GrupoDeAcesso');
        $listGrupoAcesso = [];
        while ( $row = mysqli_fetch_array($resp) ) {
            array_push($listGrupoAcesso, $row["NomeGrupo"]);
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