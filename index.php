<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pizzeria Pizze il Napolitano</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@1,300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <header>
    <div id="header-container">
      <h1>
        <spam class="green">Pizze</spam>
        <spam class="blak"> Il </spam>
        <spam class="red">Napolitano</spam>
      </h1>
      <nav>
        <ul>
          <li><a href="#">HOME</a></li>
          <li><a href="nosotros.html">NOSOTROS</a></li>
          <li><a href="sucursales.html">SUCURSALES & DELIVERY</a></li>
          <li><a href="contacto.html">CONTACTO</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="main-content">
    <h2>NUESTRAS OPCIONES</h2>
    <ul class="gallery">
  <?php
  include_once ("config_products.php");
  include_once ("db.php");

  $link= new db();
  $sql= "SELECT p.product_name, p.price, date_format(p.start_date,'%d/%m/%Y') as date, p.image,p.description, c.category_name from products p inner JOIN categories c on c.id_category=p.id_category order by category_name ASC;";
  $stmt = $link->prepare($sql);
  $stmt->execute();
  $data=$stmt->fetchAll();

  foreach($data as $row)
  {
    ?>
    <li>
        <div class="box">
          <figure>
            <img src="<?php echo $row['image'].".jpg"?>"/>
            <figcaption>
              <h3><?php echo $row['category_name']?></br><?php echo $row['product_name']?></h3>
              <h4><?php echo $row['description']?></h4>
              <p>
                $<?php echo $row['price']?>
              </p>
              <time><?php echo $row['date']?></time>
            </figcaption>
          </figure>
          <button class="button" value="1">
            Añadir al carrito <span class="fa-solid fa-cart-shopping"></span>
          </button>
        </div>
      </li>
      <?php
  }
  ?>
    </ul>
  </div>
      <footer>
        <div id="login">
        <a class="login" href="login.html">Acceso Privado</a>
        </div>
        <p>&copy; 2022</p>
      </footer>
      <script>
        let countButtons = document.querySelectorAll("button").length;
        for (i = 0; i < countButtons; i++) {
          document.querySelectorAll("button")[i].addEventListener("click", showValue);
        }
        function showValue() {
          console.log(this.value);
        }
      </script>
</body>

</html>