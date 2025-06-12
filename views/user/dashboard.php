<?php require_once 'views/templates/header.php'; ?>

<div class="container-fluid mt-4">
    <!-- Header del Dashboard -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="dashboard-title mb-2">
                            <i class="bi bi-speedometer2 me-3"></i>Dashboard
                        </h1>
                        <p class="welcome-text mb-0">
                            ¡Bienvenido de vuelta, <span class="user-name"><?= htmlspecialchars($_SESSION['username']) ?></span>! 👋
                        </p>
                        <small class="text-muted">Gestiona tus servicios y cotizaciones desde aquí</small>
                    </div>
                    <div class="dashboard-avatar">
                        <div class="avatar-circle">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isAdmin()): ?>
    <!-- Admin Dashboard con datos reales -->
    <div class="row g-4">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="dashboard-card services-card">
                <div class="card-icon">
                    <i class="bi bi-list-ul"></i>
                </div>
                <div class="card-content">
                    <h3 class="card-number"><?= isset($totalServices) ? $totalServices : 0 ?></h3>
                    <h5 class="card-title">Servicios</h5>
                    <p class="card-description">Gestionar servicios</p>
                </div>
                <div class="card-action">
                    <a href="index.php?page=service&action=list" class="btn btn-card">
                        Ver Servicios <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="card-decoration"></div>
            </div>
        </div>
        
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="dashboard-card users-card">
                <div class="card-icon">
                    <i class="bi bi-people"></i>
                </div>
                <div class="card-content">
                    <h3 class="card-number"><?= isset($totalUsers) ? $totalUsers : 0 ?></h3>
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-description">Gestionar usuarios</p>
                </div>
                <div class="card-action">
                    <a href="index.php?page=user&action=list" class="btn btn-card">
                        Ver Usuarios <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="card-decoration"></div>
            </div>
        </div>
        
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="dashboard-card quotes-card">
                <div class="card-icon">
                    <i class="bi bi-file-text"></i>
                </div>
                <div class="card-content">
                    <h3 class="card-number"><?= isset($totalQuotes) ? $totalQuotes : 0 ?></h3>
                    <h5 class="card-title">Cotizaciones</h5>
                    <p class="card-description">Ver todas las cotizaciones</p>
                </div>
                <div class="card-action">
                    <a href="index.php?page=quote&action=list" class="btn btn-card">
                        Ver Cotizaciones <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="card-decoration"></div>
            </div>
        </div>
        
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="dashboard-card payments-card">
                <div class="card-icon">
                    <i class="bi bi-credit-card"></i>
                </div>
                <div class="card-content">
                    <h3 class="card-number"><?= isset($totalPayments) ? $totalPayments : 0 ?></h3>
                    <h5 class="card-title">Pagos</h5>
                    <p class="card-description">Ver todos los pagos</p>
                </div>
                <div class="card-action">
                    <a href="index.php?page=payment&action=list" class="btn btn-card">
                        Ver Pagos <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="card-decoration"></div>
            </div>
        </div>
        
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="dashboard-card reports-card">
                <div class="card-icon">
                    <i class="bi bi-graph-up"></i>
                </div>
                <div class="card-content">
                    <h3 class="card-number"><?= isset($totalReports) ? $totalReports : 0 ?></h3>
                    <h5 class="card-title">Reportes</h5>
                    <p class="card-description">Crear y ver reportes</p>
                </div>
                <div class="card-action">
                    <a href="index.php?page=report&action=list" class="btn btn-card">
                        Ver Reportes <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="card-decoration"></div>
            </div>
        </div>
    </div>
    
    <?php else: ?>
    <!-- Client Dashboard Mejorado -->
    <div class="row g-4">
        <!-- Tarjeta Principal - Solicitar Cotización -->
        <div class="col-lg-8 mb-4">
            <div class="main-action-card">
                <div class="row h-100">
                    <div class="col-md-7">
                        <div class="main-card-content">
                            <h2 class="main-card-title">
                                <i class="bi bi-rocket-takeoff me-3"></i>
                                ¡Impulsa tu negocio!
                            </h2>
                            <p class="main-card-description">
                                Solicita una cotización personalizada para hacer crecer tu presencia digital. 
                                Nuestro equipo de expertos está listo para ayudarte.
                            </p>
                            <div class="main-card-features">
                                <div class="feature-item">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Estrategias personalizadas</span>
                                </div>
                                <div class="feature-item">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Resultados medibles</span>
                                </div>
                                <div class="feature-item">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Soporte especializado</span>
                                </div>
                            </div>
                            <a href="index.php?page=quote&action=request" class="btn btn-main-action">
                                <i class="bi bi-plus-circle me-2"></i>
                                Solicitar Cotización Ahora
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="main-card-visual">
                            <div class="floating-elements">
                                <div class="floating-icon icon-1">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                                <div class="floating-icon icon-2">
                                    <i class="bi bi-heart-fill"></i>
                                </div>
                                <div class="floating-icon icon-3">
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Estadísticas Rápidas -->
        <div class="col-lg-4 mb-4">
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-file-text"></i>
                    </div>
                    <div class="stat-content">
                        <h4 class="stat-number"><?= isset($activeQuotes) ? $activeQuotes : 0 ?></h4>
                        <p class="stat-label">Cotizaciones Activas</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h4 class="stat-number"><?= isset($completedProjects) ? $completedProjects : 0 ?></h4>
                        <p class="stat-label">Proyectos Completados</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tarjetas de Acceso Rápido -->
        <div class="col-md-6 mb-4">
            <div class="dashboard-card client-quotes-card">
                <div class="card-icon">
                    <i class="bi bi-file-text"></i>
                </div>
                <div class="card-content">
                    <h5 class="card-title">Mis Cotizaciones</h5>
                    <p class="card-description">Revisa el estado de tus solicitudes y cotizaciones pendientes</p>
                </div>
                <div class="card-action">
                    <a href="index.php?page=quote&action=list" class="btn btn-card">
                        Ver Cotizaciones <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="card-decoration"></div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="dashboard-card client-payments-card">
                <div class="card-icon">
                    <i class="bi bi-credit-card"></i>
                </div>
                <div class="card-content">
                    <h5 class="card-title">Mis Pagos</h5>
                    <p class="card-description">Consulta tu historial de pagos y transacciones realizadas</p>
                </div>
                <div class="card-action">
                    <a href="index.php?page=payment&action=list" class="btn btn-card">
                        Ver Pagos <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="card-decoration"></div>
            </div>
        </div>
        
        <!-- Sección de Servicios Disponibles -->
        <div class="col-12 mb-4">
            <div class="services-preview">
                <div class="services-header">
                    <h3 class="services-title">
                        <i class="bi bi-star me-2"></i>
                        Servicios Disponibles
                    </h3>
                    <p class="services-subtitle">Descubre nuestros planes diseñados para hacer crecer tu negocio</p>
                </div>
                <div class="services-grid">
                    <?php if (isset($services) && !empty($services)): ?>
                        <?php foreach ($services as $index => $service): ?>
                        <div class="service-preview-card" data-service-id="<?= $service['id'] ?>">
                            <div class="service-icon">
                                <?php 
                                $icons = ['bi-instagram', 'bi-graph-up', 'bi-trophy', 'bi-rocket', 'bi-star-fill', 'bi-heart-fill'];
                                $icon = $icons[$index % count($icons)];
                                ?>
                                <i class="<?= $icon ?>"></i>
                            </div>
                            <h5><?= htmlspecialchars($service['nombre']) ?></h5>
                            <p><?= htmlspecialchars(substr($service['descripcion'], 0, 50)) ?>...</p>
                            
                            <div class="service-details mb-3">
                                <?php if ($service['reels']): ?>
                                <span class="service-feature">
                                    <i class="bi bi-camera-reels"></i> <?= $service['reels'] ?> Reels
                                </span>
                                <?php endif; ?>
                                
                                <?php if ($service['post_feed']): ?>
                                <span class="service-feature">
                                    <i class="bi bi-grid-3x3"></i> <?= $service['post_feed'] ?> Posts
                                </span>
                                <?php endif; ?>
                                
                                <?php if ($service['historias']): ?>
                                <span class="service-feature">
                                    <i class="bi bi-circle"></i> <?= $service['historias'] ?> Historias
                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <span class="service-price">$<?= number_format($service['precio'], 0) ?></span>
                            
                            <div class="service-actions mt-3">
                                <button class="btn btn-service-quote" onclick="requestQuoteForService(<?= $service['id'] ?>)">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Solicitar Cotización
                                </button>
                                <button class="btn btn-service-details" onclick="showServiceDetails(<?= $service['id'] ?>)">
                                    <i class="bi bi-info-circle me-2"></i>
                                    Ver Detalles
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center">
                            <div class="no-services">
                                <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                                <h4 class="text-muted">No hay servicios disponibles</h4>
                                <p class="text-muted">Los servicios se mostrarán aquí cuando estén disponibles.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<style>
/* Estilos mejorados para el dashboard */
.welcome-header {
    background: linear-gradient(135deg, var(--pink-light), rgba(255, 255, 255, 0.9));
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(233, 30, 99, 0.1);
    border: 1px solid rgba(233, 30, 99, 0.1);
}

.dashboard-title {
    color: var(--pink-dark);
    font-weight: 700;
    font-size: 2.5rem;
}

.welcome-text {
    font-size: 1.2rem;
    color: #333;
}

.user-name {
    color: var(--pink-dark);
    font-weight: 600;
}

.dashboard-avatar {
    display: flex;
    align-items: center;
}

.avatar-circle {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
    box-shadow: 0 8px 25px rgba(233, 30, 99, 0.3);
}

/* Tarjetas del dashboard mejoradas - ALTURA FIJA PARA BOTONES */
.dashboard-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    height: 320px; /* Aumenté la altura para que los botones se vean completos */
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.dashboard-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.card-icon {
    width: 70px;
    height: 70px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    margin-bottom: 20px;
    flex-shrink: 0;
}

.card-content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.card-number {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 5px;
    color: #333;
}

.card-title {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 8px;
    color:rgb(255, 255, 255);
}

.card-description {
    color:rgb(255, 255, 255);
    font-size: 0.9rem;
    line-height: 1.4;
    margin-bottom: 0;
}

.card-action {
    margin-top: 20px;
    flex-shrink: 0;
}

.btn-card {
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: #333;
    padding: 12px 20px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    width: 100%;
    justify-content: center;
    white-space: nowrap;
}

.btn-card:hover {
    background: white;
    color: #333;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.card-decoration {
    position: absolute;
    top: -50px;
    right: -50px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    opacity: 0.1;
}

/* Colores específicos para cada tarjeta */
.services-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.services-card .card-icon {
    background: rgba(255, 255, 255, 0.2);
}

.services-card .card-decoration {
    background: white;
}

.users-card {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.users-card .card-icon {
    background: rgba(255, 255, 255, 0.2);
}

.users-card .card-decoration {
    background: white;
}

.quotes-card {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
}

.quotes-card .card-icon {
    background: rgba(255, 255, 255, 0.2);
}

.quotes-card .card-decoration {
    background: white;
}

.payments-card {
    background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    color: white;
}

.payments-card .card-icon {
    background: rgba(253, 253, 253, 0.2);
}

.payments-card .card-decoration {
    background: white;
}

.reports-card {
    background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    color: white;
}

.reports-card .card-icon {
    background: rgba(255, 255, 255, 0.2);
}

.reports-card .card-decoration {
    background: white;
}

/* Estilos para clientes */
.main-action-card {
    background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
    border-radius: 25px;
    padding: 40px;
    color: white;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.main-card-content {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.main-card-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.main-card-description {
    font-size: 1.1rem;
    margin-bottom: 25px;
    opacity: 0.9;
    line-height: 1.6;
}

.main-card-features {
    margin-bottom: 30px;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    font-size: 1rem;
}

.feature-item i {
    color: #4ade80;
    margin-right: 12px;
    font-size: 1.1rem;
}

.btn-main-action {
    background: white;
    color: var(--pink-dark);
    padding: 15px 30px;
    border-radius: 15px;
    font-weight: 600;
    font-size: 1.1rem;
    border: none;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    align-self: flex-start;
}

.btn-main-action:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    color: var(--pink-dark);
}

.main-card-visual {
    height: 100%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.floating-elements {
    position: relative;
    width: 100%;
    height: 200px;
}

.floating-icon {
    position: absolute;
    width: 60px;
    height: 60px;
    background: rgba(246, 243, 243, 0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    animation: float 3s ease-in-out infinite;
}

.icon-1 {
    top: 20px;
    right: 20px;
    animation-delay: 0s;
}

.icon-2 {
    top: 80px;
    right: 80px;
    animation-delay: 1s;
}

.icon-3 {
    top: 140px;
    right: 40px;
    animation-delay: 2s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Estadísticas */
.stats-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    height: 100%;
}

.stat-card {
    background: white;
    border-radius: 18px;
    padding: 25px;
    display: flex;
    align-items: center;
    box-shadow: 0 8px 25px rgba(243, 241, 241, 0.08);
    transition: all 0.3s ease;
    flex: 1;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.stat-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    margin-right: 20px;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--pink-dark);
    margin-bottom: 5px;
}

.stat-label {
    color: #666;
    font-size: 0.9rem;
    margin: 0;
}

/* Tarjetas de cliente - ALTURA FIJA PARA BOTONES */
.client-quotes-card, .client-payments-card {
    height: 280px; /* Altura fija para que los botones se vean completos */
}

.client-quotes-card {
    background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
    color: white;
}

.client-payments-card {
    background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
    color: white;
}

.client-quotes-card .card-icon,
.client-payments-card .card-icon {
    background: rgb(211, 201, 201)
}

/* Servicios preview */
.services-preview {
    background: white;
    border-radius: 25px;
    padding: 40px;
    box-shadow: 0 10px 30px rgb(251, 251, 251);
}

.services-header {
    text-align: center;
    margin-bottom: 40px;
}

.services-title {
    color: var(--pink-dark);
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.services-subtitle {
    color: #666;
    font-size: 1.1rem;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
}

.service-preview-card {
    background: linear-gradient(135deg, var(--pink-light), rgba(255, 255, 255, 0.9));
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid rgba(233, 30, 99, 0.1);
    min-height: 400px; /* Altura mínima para que los botones se vean bien */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.service-preview-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(233, 30, 99, 0.15);
}

.service-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 1.5rem;
}

.service-preview-card h5 {
    color: var(--pink-dark);
    font-weight: 600;
    margin-bottom: 10px;
}

.service-preview-card p {
    color: #666;
    margin-bottom: 15px;
}

.service-price {
    color: var(--pink-dark);
    font-weight: 700;
    font-size: 1.2rem;
}

/* Responsive */
@media (max-width: 768px) {
    .dashboard-title {
        font-size: 2rem;
    }
    
    .main-card-title {
        font-size: 1.8rem;
    }
    
    .dashboard-card {
        height: auto;
        min-height: 280px;
    }
    
    .floating-elements {
        display: none;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
}

/* Estilos adicionales para servicios funcionales */
.service-details {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    justify-content: center;
    margin-bottom: 15px;
}

.service-feature {
    background: rgba(233, 30, 99, 0.1);
    color: var(--pink-dark);
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 4px;
}

.service-feature i {
    font-size: 0.7rem;
}

.service-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: auto;
}

.btn-service-quote {
    background: linear-gradient(135deg, var(--pink-dark), var(--pink-darker));
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
}

.btn-service-quote:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(233, 30, 99, 0.3);
    color: white;
}

.btn-service-details {
    background: transparent;
    color: var(--pink-dark);
    border: 2px solid var(--pink-dark);
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
}

.btn-service-details:hover {
    background: var(--pink-dark);
    color: white;
    transform: translateY(-2px);
}

.service-preview-card {
    position: relative;
    cursor: pointer;
}

.service-preview-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(233, 30, 99, 0.15);
}

.no-services {
    padding: 60px 20px;
}

/* Modal para detalles del servicio */
.service-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.service-modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 30px;
    border-radius: 20px;
    width: 90%;
    max-width: 600px;
    position: relative;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.service-modal-close {
    position: absolute;
    right: 20px;
    top: 20px;
    font-size: 1.5rem;
    cursor: pointer;
    color: #999;
    transition: color 0.3s ease;
}

.service-modal-close:hover {
    color: var(--pink-dark);
}

@media (max-width: 768px) {
    .service-actions {
        flex-direction: column;
    }
    
    .btn-service-quote,
    .btn-service-details {
        font-size: 0.8rem;
        padding: 10px 15px;
    }
}
</style>

<script>
// Función para solicitar cotización de un servicio específico
function requestQuoteForService(serviceId) {
    // Mostrar confirmación
    if (confirm('¿Deseas solicitar una cotización para este servicio?')) {
        // Redirigir a la página de solicitud de cotización con el servicio preseleccionado
        window.location.href = `index.php?page=quote&action=request&service_id=${serviceId}`;
    }
}

// Función para mostrar detalles del servicio
function showServiceDetails(serviceId) {
    // Obtener datos del servicio (esto se puede mejorar con AJAX)
    const services = <?= isset($services) ? json_encode($services) : '[]' ?>;
    const service = services.find(s => s.id == serviceId);
    
    if (service) {
        let modalHtml = `
            <div class="service-modal" id="serviceModal">
                <div class="service-modal-content">
                    <span class="service-modal-close" onclick="closeServiceModal()">&times;</span>
                    <div class="text-center mb-4">
                        <h3 class="text-primary">${service.nombre}</h3>
                        <h4 class="text-success">$${parseFloat(service.precio).toLocaleString()}</h4>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Descripción:</h5>
                            <p>${service.descripcion}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Incluye:</h5>
                            <ul class="list-unstyled">
                                ${service.reels ? `<li><i class="bi bi-check text-success me-2"></i>${service.reels} Reels</li>` : ''}
                                ${service.post_feed ? `<li><i class="bi bi-check text-success me-2"></i>${service.post_feed} Posts para Feed</li>` : ''}
                                ${service.historias ? `<li><i class="bi bi-check text-success me-2"></i>${service.historias} Historias</li>` : ''}
                                ${service.grabaciones ? `<li><i class="bi bi-check text-success me-2"></i>Grabaciones: ${service.grabaciones}</li>` : ''}
                                ${service.estrategia_publicitaria ? `<li><i class="bi bi-check text-success me-2"></i>Estrategia: ${service.estrategia_publicitaria}</li>` : ''}
                            </ul>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button class="btn btn-primary me-3" onclick="requestQuoteForService(${service.id})">
                            <i class="bi bi-plus-circle me-2"></i>Solicitar Cotización
                        </button>
                        <button class="btn btn-secondary" onclick="closeServiceModal()">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        // Agregar modal al DOM
        document.body.insertAdjacentHTML('beforeend', modalHtml);
        document.getElementById('serviceModal').style.display = 'block';
    }
}

// Función para cerrar el modal
function closeServiceModal() {
    const modal = document.getElementById('serviceModal');
    if (modal) {
        modal.style.display = 'none';
        modal.remove();
    }
}

// Cerrar modal al hacer clic fuera de él
window.onclick = function(event) {
    const modal = document.getElementById('serviceModal');
    if (event.target == modal) {
        closeServiceModal();
    }
}
</script>

<?php require_once 'views/templates/footer.php'; ?>