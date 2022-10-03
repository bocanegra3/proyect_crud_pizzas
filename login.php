<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
$usr=$_POST['username'];
$pass=$_POST['password'];
$hashed_pass=hash('sha256',$pass);

include_once"config_login.php";
include_once"db.php";

$link=new Db();/*Objeto*/
$sql="SELECT * FROM `users` WHERE (username=:usr OR email=:usr) AND (password=:hashed_pass) AND (active='si');";
$stmt=$link->prepare($sql);/*Con la flecha se llama atributo y metodos de ese objeto,*/
$stmt->bindValue(':usr',$usr);
$stmt->bindValue(':hashed_pass',$hashed_pass);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

if($row==0){
?>
<div class="alert alert-danger">
<a href="login.html" class="close" data-dismiss="alert">return</a>
<div class="text-center"> <strong>ERROR 901-</strong> Corrobore los datos ingresados </div>
</div>
<?php
}
else{
    session_start();
    date_default_timezone_set('America/Argentina/Buenos_Aires');
$_SESSION['time']=date('H:i:s');
$_SESSION['username']=$usr;
$_SESSION['logueado']=true;

    header('location:welcome.php');
}
?>



