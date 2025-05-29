<?php
$requiredRole = 'admin';
include("auth.php"); // auth.php ya contiene control de sesión y caché
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
    <title>Panel de Administrador</title>

    <!-- Validación de sesión con JS -->
    <script>
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

    <!-- Estilos -->
    <style>
        :root {
            --color-fondo: rgb(255, 255, 255);
            --color-principal: rgb(196, 121, 146);
            --color-secundario: rgb(196, 121, 146);
            --color-hover: #d39ed1;
            --color-texto: #333;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: var(--color-fondo);
            color: var(--color-texto);
        }

        header {
            position: fixed;
            top: 0;
            left: 220px;
            right: 0;
            background-color: var(--color-principal);
            padding: 1rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            z-index: 1000;
        }

        aside {
            width: 250px;
            background-color: var(--color-secundario);
            padding-top: 2rem;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            color: white;
        }

        aside h2 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.3rem;
        }

        aside ul {
            list-style: none;
            padding-left: 0;
        }

        aside li {
            padding: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        aside li:hover {
            background-color: var(--color-hover);
        }

        main {
            margin-left: 260px;
            padding: 6rem 2rem 2rem 2rem;
            flex-grow: 1;
        }

        h3 {
            color: var(--color-secundario);
        }
    </style>
</head>

<body>
    <aside>
        <h2>Modulos</h2>
        <ul>
            <li onclick="mostrarContenido('registrar')">📝 Registrar Servicios</li>
            <li onclick="mostrarContenido('ver_servicios')">📂 Ver Servicios Registrados</li>
            <li onclick="mostrarContenido('reportes')">📊 Ver Reportes</li>
            <li onclick="mostrarContenido('usuarios')">👥 Gestionar Usuarios</li>
            <li onclick="window.location.href='logout.php'">🚪 Cerrar Sesión</li>
        </ul>
    </aside>

    <header>
        Panel del Administrador - Marketing Valentina
    </header>

    <main id="contenido">
        <h3>Bienvenido al panel de administración</h3>
        <p>Seleccione una opción del catálogo para comenzar.</p>
        <?php if (isset($_SESSION['message'])): ?>
            <div style="padding: 1rem; background-color: #fff0f5; color: #b36a94; margin-bottom: 1rem; border-radius: 5px;">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
    </main>

    <script>
        function mostrarContenido(seccion) {
            const contenido = document.getElementById('contenido');
            if (seccion === 'registrar') {
                contenido.innerHTML = `
                    <h3>Registrar Servicios</h3>
                    <form action="save_service.php" method="POST">
                        <div style="margin-bottom: 1rem;">
                            <label for="nombre">Nombre del Servicio:</label><br>
                            <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 0.5rem;">
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label for="descripcion">Descripción:</label><br>
                            <textarea id="descripcion" name="descripcion" rows="4" required style="width: 100%; padding: 0.5rem;"></textarea>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label for="precio">Precio:</label><br>
                            <input type="number" step="0.01" id="precio" name="precio" required style="width: 100%; padding: 0.5rem;">
                        </div>
                        <button type="submit" style="background-color: #d39ed1; color: white; padding: 0.6rem 1.2rem; border: none; border-radius: 5px;">Guardar Servicio</button>
                    </form>
                `;
            } else if (seccion === 'ver_servicios') {
                fetch('view_services.php')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('contenido').innerHTML = html;
                    });
            } else if (seccion === 'reportes') {
                contenido.innerHTML = '<h3>Ver Reportes</h3><p>Sección para visualizar reportes generados.</p>';
            } else if (seccion === 'usuarios') {
                contenido.innerHTML = '<h3>Gestionar Usuarios</h3><p>Administre los usuarios registrados en el sistema.</p>';
            }
        }
    </script>
</body>

</html>