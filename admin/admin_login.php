<?php

include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){

   // Recibimos el nombre de usuario y lo sanitizamos
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   // Codificamos la contraseña ingresada usando sha1
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   // Consultamos la base de datos para encontrar un administrador con las credenciales ingresadas
   $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   
   if($select_admin->rowCount() > 0){
      // Si encontramos el usuario, iniciamos la sesión
      $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
      $_SESSION['admin_id'] = $fetch_admin_id['id'];
      header('location:\JuanitoVA-main\JuanitoVa!\admin\dashboard.php');
   }else{
      // Si las credenciales no son correctas, mostramos un mensaje de error
      $message[] = 'Usuario o contraseña incorrectos';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="icon" href=".\images\far.png">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- admin login form section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>Iniciar sesión</h3>
      <input type="text" name="name" maxlength="20" required placeholder="Ingresar usuario" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="Ingresar contraseña" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Iniciar sesión" name="submit" class="btn">
   </form>

</section>

<!-- admin login form section ends -->

</body>
</html>
