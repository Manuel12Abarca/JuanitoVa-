<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Juanito Va!</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href=".\images\far.png">


</head>

<body>

   <?php include 'components/user_header.php'; ?>



   <section class="hero">

      <div class="swiper hero-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <div class="content">
                  <span>Medicina para todos</span>
                  <h3>Al mejor precio</h3>
                  <a href="./menu.php" class="btn">Ver medicamentos</a>
               </div>
               <div class="image">
                  <img src="images/5.jpg" alt="">
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="content">
                  <span>Ordena en Linea</span>
                  <h3>Salud a la palma de tu mano</h3>
                  <a href="./menu.php" class="btn">Ver medicamentos</a>
               </div>
               <div class="image">
                  <img src="images/1.1.jpg" alt="">
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="content">
                  <span>Ordena ya</span>
                  <h3>antibacterial</h3>
                  <a href="./menu.php" class="btn">Ver medicamentos</a>
               </div>
               <div class="image">
                  <img src="images/3.jpg" alt="">
               </div>
            </div>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <section class="category">
      <h1 class="title">Categorias</h1>
      <div class="carousel-container">
         <div class="carousel">
            <a href="category.php?category=alergias" class="box">
               <img src="images/cat-1.png" alt="">
               <h3>Alergias</h3>
            </a>
            <a href="category.php?category=gripe" class="box">
               <img src="images/cat-2.png" alt="">
               <h3>Gripe y tos</h3>
            </a>
            <a href="category.php?category=piel" class="box">
               <img src="images/cat-3.png" alt="">
               <h3>Piel</h3>
            </a>
            <a href="category.php?category=bucal" class="box">
               <img src="images/cat-4.png" alt="">
               <h3>Salud bucal y visual</h3>
            </a>
            <a href="category.php?category=cuidado capilar" class="box">
               <img src="images/cat-5.png" alt="">
               <h3>Cuidado Capilar</h3>
            </a>
            <a href="category.php?category=venta libre" class="box">
               <img src="images/cat-6.png" alt="">
               <h3>Venta Libre</h3>
            </a>
            <a href="category.php?category=sexual" class="box">
               <img src="images/cat-7.png" alt="">
               <h3>Sexual</h3>
            </a>
            <a href="category.php?category=analgesicos" class="box">
               <img src="images/cat-8.png" alt="">
               <h3>Analgésicos</h3>
            </a>
            <a href="category.php?category=suplemento" class="box">
               <img src="images/cat-9.png" alt="">
               <h3>Suplementos</h3>
            </a>
            <a href="category.php?category=estomacales" class="box">
               <img src="images/cat-10.png" alt="">
               <h3>Estomacales</h3>
            </a>
         </div>
      </div>
   </section>
   <script>
      $(document).ready(function() {
         $(".carousel").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<button class="prev">&#10094;</button>',
            nextArrow: '<button class="next">&#10095;</button>',
            responsive: [{
               breakpoint: 768,
               settings: {
                  slidesToShow: 4,
                  slidesToScroll: 2
               }
            }]
         });
      });
   </script>


   <section class="products">
      <h1 class="title">Ultimas medicinas</h1>

      <div class="box-container">

         <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                  <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                  <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                  <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                  <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                  <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                  <img src="images/Products/<?= $fetch_products['image']; ?>" alt="">
                  <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
                  <div class="name"><?= $fetch_products['name']; ?></div>
                  <div class="flex">
                     <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                     <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">no hay productos agregados</p>';
         }
         ?>

      </div>

      <div class="more-btn">
         <a href="menu.php" class="btn">Mirar mas</a>
      </div>

   </section>


   <?php include 'components/footer.php'; ?>


   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <script>
      var swiper = new Swiper(".hero-slider", {
         loop: true,
         grabCursor: true,
         effect: "flip",
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
      });
   </script>

</body>

</html>