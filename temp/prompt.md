🔧 [MÓDULO 1] Configuración Base del Proyecto
🎯 Objetivo: Crear y configurar un proyecto Laravel moderno con autenticación y base técnica sólida.

📋 Detalles:

Usar Laravel con Jetstream + Inertia.js (Vue 3).

Instalar Spatie Laravel Permission.

Agregar soporte para websockets y broadcasting (Pusher o Laravel Websockets).

Crear dos layouts Blade: uno móvil, otro escritorio.

✅ Tareas:

laravel new para crear el proyecto.

composer require laravel/jetstream && php artisan jetstream:install inertia

composer require spatie/laravel-permission

Configurar middleware y service providers para Spatie.

Crear layouts/mobile.blade.php y layouts/desktop.blade.php con detección por dispositivo o pantalla.

Agregar soporte de Vue + Tailwind + router.

🌐 [MÓDULO 2] Personalización del Usuario
🎯 Objetivo: Permitir a cada usuario personalizar tema (claro/oscuro) e idioma (es/en).

📋 Detalles:

Guardar preferencia de idioma y tema en la base de datos del usuario.

Cargar automáticamente las preferencias al iniciar sesión.

✅ Tareas:

Crear campos theme e idioma en la tabla users.

Agregar selector en el UI (toggle para tema, switch para idioma).

Middleware o lógica Vue para aplicar clases de Tailwind dark.

Configurar archivos en resources/lang para ES y EN.

🛡️ [MÓDULO 3] Sistema de Roles y Permisos
🎯 Objetivo: Establecer control de acceso por rol y permisos con Spatie.

📋 Detalles:

Roles: Migrante, Agente, Admin, SuperAdmin.

Asignación automática de rol "Migrante" a usuarios nuevos.

Middleware role para proteger rutas.

✅ Tareas:

Crear y seedear roles.

Relacionar usuarios con roles.

Middleware para proteger rutas y componentes por rol.

Seeders para crear usuario inicial de cada tipo.

📝 [MÓDULO 4] Onboarding Personalizado
🎯 Objetivo: Mostrar un cuestionario al primer login de Migrantes y Agentes.

📋 Detalles:

Tabla onboarding_questions y user_answers.

Admin puede crear/editar preguntas.

Agente puede ver respuestas de sus migrantes.

SuperAdmin puede ver todas.

✅ Tareas:

Detectar primer login con flag o middleware.

Crear formulario dinámico en Vue.

Guardar respuestas en la base.

Paneles de visualización por rol.

🗺️ [MÓDULO 5] Roadmap tipo Duolingo
🎯 Objetivo: Mostrar un camino gamificado para migrantes, dividido por categorías y tareas.

📋 Detalles:

Tablas: roadmap_categories, roadmap_tasks, user_progress.

Interfaz visual tipo roadmap (con iconos o niveles).

Agente puede ver el progreso de sus migrantes.

✅ Tareas:

Crear relaciones entre tareas, categorías y usuarios.

Vue frontend con componente visual tipo camino.

Mostrar detalles de cada tarea.

Marcar tareas como completadas.

🔔 [MÓDULO 6] Sistema de Notificaciones
🎯 Objetivo: Enviar notificaciones internas según el rol del emisor.

📋 Detalles:

Agente → sus migrantes.

Admin → sus agentes + migrantes.

SuperAdmin → todos.

✅ Tareas:

Implementar Laravel Notifications.

Crear UI Vue para visualizar notificaciones.

Filtros y búsqueda por tipo de mensaje.

Backend para enviar y distribuir notificaciones según jerarquía.

💬 [MÓDULO 7] Chat en Tiempo Real
🎯 Objetivo: Comunicación privada en tiempo real entre agentes y migrantes.

📋 Detalles:

Chat 1:1.

Estado: online, escribiendo, última conexión, tiempo medio de respuesta.

Websockets con Echo + Pusher o Laravel Websockets.

✅ Tareas:

Modelo Message con timestamps.

Canales privados con autenticación.

Vue frontend estilo chat.

Listado de conversaciones.

Eventos typing, online status, seen.

🎓 [MÓDULO 8] Entrenamiento de Agentes
🎯 Objetivo: Capacitar agentes con módulos y tareas creados por Admin/SuperAdmin.

📋 Detalles:

Tablas: training_modules, training_tasks, agent_progress.

Progreso desbloquea más migrantes a cargo.

✅ Tareas:

Crear editor de módulos para admin.

Asignar módulos a agentes.

Trackear progreso.

Lógica de “nivel” que limita cantidad de migrantes según progreso.

🔄 [MÓDULO 9] Asignación de Migrantes a Agentes
🎯 Objetivo: Controlar cuántos migrantes maneja cada agente.

📋 Detalles:

Migrantes se asignan al único agente disponible inicialmente.

Admin puede definir límite por agente.

Preparar lógica para asignación futura (algoritmo inteligente, especialidades, etc.)

✅ Tareas:

Relación many-to-one entre Migrantes y Agente.

Campo max_migrants editable por Admin.

Ver migrantes asignados en dashboard de agente.

🧪 [MÓDULO 10] Testing y Producción
🎯 Objetivo: Validar, testear y dejar la aplicación lista para producción.

📋 Detalles:

Testing unitario y funcional.

Configuración para entorno de producción.

✅ Tareas:

Pruebas en modelos, policies y servicios.

npm run build y optimización (php artisan optimize).

Configuración de .env para producción.

Configuración de broadcasting (si usa Pusher) y notificaciones externas (mail, etc.).

