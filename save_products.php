<?php
$product=$_POST['producto'];
$price=$_POST['precio'];
$category=$_POST['categoria'];

include_once"config_products.php";
include_once"db.php";

$link=new Db();/*Objeto*/
include_once("upload_image.php");
$path_img=$directorio.$nombre_img;//ruta completa de la imagen levantada.
$path_img=substr($path_img,0,strpos($path_img,".jpg"));//este codigo es para quitar el jpg ya que le habia agregado antes en index.php
$sql="INSERT products ( product_name, price, id_category, image) values (:product,:price,:category,:path_img);";
$stmt = $link->prepare($sql);
$stmt->bindValue(':product',$product);
$stmt->bindValue(':price',$price);
$stmt->bindValue(':category',$category);
$stmt->bindValue(':path_img',$path_img);//no es necesario sanear
if ($stmt->execute()){
    ?>
    <script>
    alert("Producto Ingresado!");
    window.location="insert_products.php";
    </script>
    <?php
}
$data=$stmt->fetchAll();
?>

