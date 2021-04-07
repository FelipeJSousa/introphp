<?php
    $url='localhost';
    $username='sysdba';
    $password='123sys123dba';
    $conn=mysqli_connect($url,$username,$password,"piloto");
    if(!$conn){
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
        // die('Could not Connect My Sql:' .mysql_error());
    }
?>