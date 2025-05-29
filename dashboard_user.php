<?php
$requiredRole = 'user';
include("auth.php"); // auth.php ya se encarga del control de sesión y caché
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
    <script>
        // Check session status on page load
        window.onload = function() {
            fetch('check_session.php')
                .then(response => response.json())
                .then(data => {
                    if (!data.authenticated) {
                        window.location.href = 'login.php';
                    }
                })
                .catch(error => {
                    console.error('Error checking session:', error);
                    window.location.href = 'login.php';
                });
        };
    </script>
    <style>
        body {
            background-color: #fdf6ef;
            font-family: Arial, sans-serif;
            padding: 2rem;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff6f8;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #b36a94;
        }

        a {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: #d5bfa3;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #b09474;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bienvenido Usuario, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        <p>Has iniciado sesión correctamente. Desde aquí podrás consultar servicios y tu historial de cotizaciones.</p>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
