<?php 
    include_once"config_login.php";

function openCon()
                    {
    $dsn="mysql:dbname=".DATABASE_NAME."host=".SERVER_NAME;
    $link =new PDO($dsn,USER_NAME,PASSWORD);    
    return $link;
}

function closeCon($a)
                    {
    $a=null;
}

$con=openCon();

closeCon($con);
