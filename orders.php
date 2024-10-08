<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ordenes</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href=".\images\far.png">

</head>
<body>
   

<?php include 'components/user_header.php'; ?>


<div class="heading">
   <h3>Ordenes</h3>
   <p><a href="html.php">Home</a> <span> / Ordenes</span></p>
</div>

<section class="orders">

   <h1 class="title">Tus Ordenes</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">inicie sesión para ver sus pedidos</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>colocado en : <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>Nombre : <span><?= $fetch_orders['name']; ?></span></p>
      <p>Email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>Numero : <span><?= $fetch_orders['number']; ?></span></p>
      <p>Direccion : <span><?= $fetch_orders['address']; ?></span></p>
      <p>Metodo de pago : <span><?= $fetch_orders['method']; ?></span></p>
      <p>Tus Ordenes : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>Precio total : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
      <p>Estado del pago : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">aún no hay pedidos</p>';
      }
      }
   ?>

   </div>

</section>
<?php include 'components/footer.php'; ?>
<script src="js/script.js"></script>

</body>
</html>