<?php require_once 'views/templates/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="bi bi-plus"></i> Crear Nuevo Servicio</h4>
                    <p class="mb-0 text-light">Puedes usar emojis y caracteres especiales en la descripción 😊</p>
                </div>
                <div class="card-body">
                    <form method="POST" accept-charset="UTF-8">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre del Servicio *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required
                                    placeholder="Ej: Paquete Premium 💎">
                                <small class="form-text text-muted">Puedes incluir emojis para hacer más atractivo el nombre</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="precio" class="form-label">Precio *</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción *</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required
                                placeholder="Describe tu servicio... Puedes usar emojis 🚀✨💼"></textarea>
                            <small class="form-text text-muted">Describe detalladamente qué incluye este servicio</small>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="reels" class="form-label">Cantidad de Reels</label>
                                <input type="number" class="form-control" id="reels" name="reels" min="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="post_feed" class="form-label">Posts para Feed</label>
                                <input type="number" class="form-control" id="post_feed" name="post_feed" min="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="historias" class="form-label">Historias</label>
                                <input type="number" class="form-control" id="historias" name="historias" min="0">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="grabaciones" class="form-label">Grabaciones</label>
                                <input type="text" class="form-control" id="grabaciones" name="grabaciones"
                                    placeholder="Ej: Profesionales, Básicas, etc.">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="estrategia_publicitaria" class="form-label">Estrategia Publicitaria</label>
                                <input type="text" class="form-control" id="estrategia_publicitaria" name="estrategia_publicitaria"
                                    placeholder="Ej: Avanzada, Básica, Integral, etc.">
                            </div>
                        </div>

                        <!-- Ejemplos de emojis útiles -->
                        <div class="mb-3">
                            <label class="form-label">Emojis útiles para copiar:</label>
                            <div class="emoji-helper p-3 bg-light rounded">
                                <span class="emoji-category">
                                    <strong>Marketing:</strong> 📱 💻 📊 📈 📉 💡 🚀 ✨ 💎 🎯 📢 📣
                                </span><br>
                                <span class="emoji-category">
                                    <strong>Negocios:</strong> 💼 🏢 💰 💳 📋 📝 ✅ ❌ ⭐ 🏆 🎖️ 🥇
                                </span><br>
                                <span class="emoji-category">
                                    <strong>Redes:</strong> 📸 🎥 🎬 🎨 🖼️ 📷 📹 🎭 🎪 🎨 🖌️ ✏️
                                </span><br>
                                <span class="emoji-category">
                                    <strong>Emociones:</strong> 😊 😍 🤩 😎 🔥 💖 💯 👍 👏 🙌 💪 🎉
                                </span>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php?page=service&action=list" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Crear Servicio
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .emoji-helper {
        border: 1px solid #dee2e6;
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .emoji-category {
        display: block;
        margin-bottom: 8px;
    }

    .emoji-helper span:not(.emoji-category) {
        cursor: pointer;
        padding: 2px 4px;
        border-radius: 4px;
        transition: background-color 0.2s;
    }

    .emoji-helper span:not(.emoji-category):hover {
        background-color: var(--pink-light);
    }
</style>

<script>
    // Permitir hacer clic en los emojis para copiarlos
    document.querySelectorAll('.emoji-helper span:not(.emoji-category)').forEach(span => {
        span.addEventListener('click', function() {
            const emoji = this.textContent.trim();
            if (emoji) {
                // Copiar al portapapeles
                navigator.clipboard.writeText(emoji).then(() => {
                    // Mostrar feedback visual
                    this.style.backgroundColor = 'var(--pink-medium)';
                    setTimeout(() => {
                        this.style.backgroundColor = '';
                    }, 300);
                });
            }
        });
    });

    // Contador de caracteres para la descripción
    document.getElementById('descripcion').addEventListener('input', function() {
        const maxLength = 1000;
        const currentLength = this.value.length;

        // Crear o actualizar contador si no existe
        let counter = document.getElementById('desc-counter');
        if (!counter) {
            counter = document.createElement('small');
            counter.id = 'desc-counter';
            counter.className = 'form-text text-muted';
            this.parentNode.appendChild(counter);
        }

        counter.textContent = `${currentLength}/${maxLength} caracteres`;

        if (currentLength > maxLength * 0.9) {
            counter.className = 'form-text text-warning';
        } else {
            counter.className = 'form-text text-muted';
        }
    });
</script>

<style>
    .emoji-helper {
        border: 1px solid #dee2e6;
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .emoji-category {
        display: block;
        margin-bottom: 8px;
    }

    .emoji-helper span:not(.emoji-category) {
        cursor: pointer;
        padding: 2px 4px;
        border-radius: 4px;
        transition: background-color 0.2s;
    }

    .emoji-helper span:not(.emoji-category):hover {
        background-color: var(--pink-light);
    }
</style>

<script>
    // Permitir hacer clic en los emojis para copiarlos
    document.querySelectorAll('.emoji-helper span:not(.emoji-category)').forEach(span => {
        span.addEventListener('click', function() {
            const emoji = this.textContent.trim();
            if (emoji) {
                // Copiar al portapapeles
                navigator.clipboard.writeText(emoji).then(() => {
                    // Mostrar feedback visual
                    this.style.backgroundColor = 'var(--pink-medium)';
                    setTimeout(() => {
                        this.style.backgroundColor = '';
                    }, 300);
                });
            }
        });
    });

    // Contador de caracteres para la descripción
    document.getElementById('descripcion').addEventListener('input', function() {
        const maxLength = 1000;
        const currentLength = this.value.length;

        // Crear o actualizar contador si no existe
        let counter = document.getElementById('desc-counter');
        if (!counter) {
            counter = document.createElement('small');
            counter.id = 'desc-counter';
            counter.className = 'form-text text-muted';
            this.parentNode.appendChild(counter);
        }

        counter.textContent = `${currentLength}/${maxLength} caracteres`;

        if (currentLength > maxLength * 0.9) {
            counter.className = 'form-text text-warning';
        } else {
            counter.className = 'form-text text-muted';
        }
    });
</script>
<?php require_once 'views/templates/footer.php'; ?>