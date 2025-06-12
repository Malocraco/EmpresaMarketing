<script>
// Verificación adicional del lado del cliente
(function() {
    // Verificar si la página se está cargando desde el caché del navegador
    if (performance.navigation.type === 2) {
        // La página se cargó desde el caché (botón atrás)
        // Hacer una verificación AJAX para confirmar la sesión
        fetch('index.php?page=user&action=checkSession', {
            method: 'GET',
            cache: 'no-cache'
        })
        .then(response => response.json())
        .then(data => {
            if (!data.authenticated) {
                // Si no está autenticado, redirigir al login
                window.location.href = 'index.php?page=user&action=login';
            }
        })
        .catch(() => {
            // En caso de error, redirigir al login por seguridad
            window.location.href = 'index.php?page=user&action=login';
        });
    }
    
    // Prevenir el uso del botón atrás después del logout
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            // La página se cargó desde el caché
            window.location.reload();
        }
    });
})();
</script>