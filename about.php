<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sobre nosotros</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href=".\images\far.png">


</head>
<body>
<?php include 'components/user_header.php'; ?>

<div class="heading">
   <h3>Sobre nosotros</h3>
   <p><a href="home.php">Home</a> <span> / Sobre Nosotros</span></p>
</div>


<section class="about">

   <div class="row">

      <div class="image">
         <img src=".\images\ab.svg" alt="">
      </div>

      <div class="content">
         <h3>¿Por qué elegirnos?</h3>
         <p>En Farmacias Juanito Va Buscamos Desarrollar Productos Y Servicios Innovadores, Por Lo Cual Hemos Creado El Primer Programa De Fidelización Del Mercado Farmacéutico, Lanzado En El Año 2023 Como Una Forma De Premiar La Preferencia De Nuestros Clientes Y Con Una Renovación Constante, Ha Sumado Nuevos Beneficios Y Precios Preferenciales En Medicamentos.</p>
            <p>En Farmacia Juanito Va, Cuidamos De Tu Salud Con Asistencia De Enfermería Totalmente Gratis, Cuidando La Salud De Los Salvadoreños.</p>
         <a href="menu.php" class="btn">Nuestros Medicamentos</a>
      </div>

   </div>

</section>

<section class="steps">

   <h1 class="title">Pasos simples</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>Haz tu orden</h3>
         <p>Los medicamentos y productos de conveniencia publicados en este medio cumplen las regulaciones y precios máximos establecidos en nuestro país..</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>Rapida entrega</h3>
         <p>Las entrega de medicamentos y productos de conveniencia pueden variar desde 1 a 72 horas, dependiendo de la zona de entrega y nivel de saturación de pedidos.</p>
      </div>

      <div class="box">


         <img src="images/corazon.png" alt="">
         <h3>Disfrute medicamentos</h3>
         <p>Disfruta de tus medicamentos y asegúrate de seguir las indicaciones de tu médico o farmacéutico para obtener el máximo beneficio de tu tratamiento.
</p>

      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Valoraciones</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/pic-1.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias ut earum nulla sint voluptatum labore nemo.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-2.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias ut earum nulla sint voluptatum labore nemo.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-3.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias ut earum nulla sint voluptatum labore nemo.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/pic-4.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate eligendi laborum molestias ut earum nulla sint voluptatum labore nemo.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>john deo</h3>
         </div>


      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>



<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>