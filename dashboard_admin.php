<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administrador</title>
  <style>
    :root {
      --color-fondo: #fdf6ef;
      --color-primario: #d5bfa3;
      --color-secundario: #b09474;
      --color-texto: #333;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: var(--color-fondo);
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    header {
      background-color: var(--color-primario);
      padding: 1rem;
      text-align: center;
      font-size: 1.5rem;
      font-weight: bold;
      color: var(--color-texto);
    }

    .container {
      flex: 1;
      display: flex;
    }

    aside {
      width: 220px;
      background-color: var(--color-secundario);
      padding: 1rem;
      color: white;
    }

    aside h2 {
      margin-bottom: 1rem;
      font-size: 1.2rem;
    }

    aside ul {
      list-style: none;
    }

    aside li {
      margin: 10px 0;
      cursor: pointer;
      padding: 0.5rem;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    aside li:hover {
      background-color: #8a745c;
    }

    main {
      flex: 1;
      padding: 2rem;
    }
  </style>
</head>
<body>
  <header>
    Panel del Administrador - Marketing Valentina
  </header>

  <div class="container">
    <aside>
      <h2>Catálogo</h2>
      <ul>
        <li onclick="mostrarContenido('registrar')">Registrar Servicios</li>
        <li onclick="mostrarContenido('reportes')">Ver Reportes</li>
        <li onclick="mostrarContenido('usuarios')">Gestionar Usuarios</li>
        <li onclick="window.location.href='logout.php'">Cerrar Sesión</li>
      </ul>
    </aside>

    <main id="contenido">
      <h3>Bienvenido al panel de administración</h3>
      <p>Seleccione una opción del catálogo para comenzar.</p>
    </main>
  </div>

  <script>
    function mostrarContenido(seccion) {
      const contenido = document.getElementById('contenido');
      if (seccion === 'registrar') {
        contenido.innerHTML = '<h3>Registrar Servicios</h3><p>Aquí podrá registrar los servicios ofrecidos por la empresa.</p>';
      } else if (seccion === 'reportes') {
        contenido.innerHTML = '<h3>Ver Reportes</h3><p>Sección para visualizar reportes generados.</p>';
      } else if (seccion === 'usuarios') {
        contenido.innerHTML = '<h3>Gestionar Usuarios</h3><p>Administre los usuarios registrados en el sistema.</p>';
      }
    }
  </script>
</body>
</html>
