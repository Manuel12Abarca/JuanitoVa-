<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">
        <img src="img/img1.svg" alt="">
        <h1>La página que ha solicitado no se encuentra disponible</h1>
        <div class="boton">
            <button id="volverAtras">Volver</button>
        </div>
    </div>

    <script>
        // Obtén el botón por su ID
        var botonVolverAtras = document.getElementById("volverAtras");

        // Agrega un evento de clic al botón
        botonVolverAtras.addEventListener("click", function() {
            // Redirige a la página deseada con extensión .php
            window.location.href = "../home.php";
        });
    </script>
</body>

</html>