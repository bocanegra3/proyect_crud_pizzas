<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Productos</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center">Ingreso de Productos</h5>
            </div>
            <div class="col-md-12">
                <form class="form-group" accept-charset="utf-8" action="save_products.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <br>
                    <label class="control-label" for="producto"><strong>Producto</strong></label>
                    <input type="text" require="" placeholder="Inserte aquí el nombre del producto." class="form-control" id="producto" name="producto">
                    </div>

                    <div class="form-group">
                    <br>
                    <label class="control-label" for="precio"><strong>Precio</strong></label>
                    <input type="text" require="" placeholder="Inserte aquí el precio del producto." class="form-control" id="precio" name="precio">
                    </div>

                    <div class="form-group">
                    <br>
                    <label class="control-label" for="categoria"><strong>Categoria</strong></label>
                    <select id="categoria" name="categoria" class="form-control">
                         <?php
                    include_once"config_products.php";
                    include_once"db.php";
                    
                    $link=new Db();/*Objeto*/
                    $sql="SELECT category_name, id_category FROM categories order by category_name;";
                    $stmt = $link->prepare($sql);
                    $stmt->execute();
                    $data=$stmt->fetchAll();
                    foreach($data as $row){
                        echo '<option value="'.$row['id_category'].'">'.$row['category_name'].'</option>';
                    }
                    ?>
                    </select>
                    <br>
                    </div>
                        <div class="form-group">
                            <label class="control-label" for="file"><strong>Seleccione la imagen a subir</strong></label>
                            <input type="file" id="imagen" class="form-control" name="imagen" size="30">
                        </div>
                        <br>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Añadir Producto">
                        </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>