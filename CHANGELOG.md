# Changelog

Todos los cambios notables en este proyecto serán documentados en este archivo.

El formato está basado en [Keep a Changelog](https://keepachangelog.com/es/1.0.0/),
y este proyecto adhiere a [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Agregado
- Componente `application-mark` para mostrar el logo de la aplicación de manera consistente
- Autor: Eze Chavez
- Fecha: {{ date('Y-m-d') }}

- Componente `dropdown` para menús desplegables interactivos
- Autor: Eze Chavez 
- Fecha: {{ date('Y-m-d') }}

- Configuración de broadcasting y websockets con Pusher
  - Creación del archivo config/broadcasting.php
  - Configuración de variables de entorno para Pusher
  - Autor: Eze Chavez
  - Fecha: 2024-04-24

- Creación del archivo `.gitignore` en la raíz del proyecto con configuración completa para Laravel
  - Incluye reglas para node_modules, archivos de entorno, caché, logs y archivos del sistema
  - Autor: Eze Chavez
  - Fecha: {{ date('Y-m-d') }}

### Corregido
- Error en pruebas debido a la ausencia del componente `application-mark`
- Error en pruebas debido a la ausencia del componente `dropdown`

### Added
- Creación del archivo `database_schema.md` para documentar la estructura de la base de datos
  - Autor: Eze Chavez
  - Fecha: {{ date('Y-m-d') }}
  - Incluye esquema inicial del módulo de autenticación con tablas users, password_reset_tokens y sessions
  - Documentación de convenciones generales, relaciones e índices
- Creación de navegación móvil en `resources/views/layouts/mobile.blade.php`
- Implementación del método `withPersonalTeam()` en el modelo User para la creación automática de equipos personales
- Implementación del método `belongsToTeam()` para verificar la pertenencia de usuarios a equipos
- Columnas estándar (edit_user_id, deleted_at) agregadas a las tablas teams, team_user y team_invitations
- Navegación móvil
- Métodos para gestionar equipos personales en el modelo User
- Mejoras en la estructura de navegación móvil y gestión de equipos personales

### Database Changes
- Agregada columna `edit_user_id` a la tabla `users` para tracking de ediciones
  - Autor: Eze Chavez
  - Fecha: 2024-04-24
- Agregada columna `deleted_at` a la tabla `users` para soft deletes
  - Autor: Eze Chavez
  - Fecha: 2024-04-24

## [0.1.1] - 2024-04-24
### Añadido
- Pruebas automatizadas para autenticación
- Pruebas automatizadas para diseño responsivo
- Verificación de elementos de UI en móvil y escritorio

### Técnico
- Implementación de TestCase para autenticación
- Implementación de TestCase para layouts responsivos
- Cobertura de pruebas para elementos críticos de UI

## [0.1.0] - 2024-04-24
### Añadido
- Configuración inicial del proyecto Laravel
- Instalación de Jetstream con Inertia.js
- Instalación de Laravel Sanctum
- Layout responsivo único que se adapta a móvil y escritorio
- Navegación inferior para dispositivos móviles
- Menú de usuario en la versión de escritorio
- Soporte para autenticación con Jetstream

### Técnico
- Implementación de diseño responsivo usando Tailwind CSS
- Configuración de rutas de autenticación
- Integración de Vue.js con Inertia
- Configuración de middleware de autenticación

### Autor
- Eze Chavez

## [Unreleased]

### Added
- Componente `application-mark` para mostrar el logo de la aplicación de manera consistente
- Autor: eze Chavez
- Fecha: {{ date('Y-m-d') }}
- Componente `nav-link` para la navegación responsiva
- Autor: Eze Chavez
- Fecha: {{ date('Y-m-d') }}
- Componente `dropdown-link` para enlaces dentro de menús desplegables
- Autor: Eze Chavez
- Fecha: {{ date('Y-m-d') }}

### Fixed
- Error en las pruebas debido a la falta del componente application-mark
- Error en las pruebas debido a la falta del componente nav-link
- Error en las pruebas debido a la falta del componente dropdown 

### Documentación
- Actualizada la documentación en project_directory.md para detallar los tipos y descripciones de las columnas estándar en todas las tablas (edit_user_id, created_at, deleted_at).

**Autor:** Eze Chavez
**Fecha:** {{ date('Y-m-d') }}

### Documentación
- Creación del archivo `test_history.md` para documentar los resultados de las pruebas automatizadas
  - Autor: Eze Chavez
  - Fecha: {{ date('Y-m-d') }}
  - Incluye resultados detallados de las pruebas del módulo de autenticación
  - Documentación de tiempos de ejecución y aserciones
  - Recomendaciones para futuras pruebas

### Changed
- Actualización de la estructura de navegación móvil con diseño mejorado y responsive
- Mejora en la gestión de equipos personales con validaciones adicionales

## [1.0.0] - 2024-03-20
### Added
- Estructura inicial del proyecto
- Implementación de autenticación básica
- Configuración inicial de Jetstream

### Author
- Eze Chavez 

## [1.0.1] - 2024-03-20
### Agregado
- Nuevas columnas estándar en todas las tablas:
  - `edit_user_id` (BIGINT UNSIGNED)
  - `created_at` (TIMESTAMP)
  - `deleted_at` (TIMESTAMP NULL)
- Módulo de Equipos con estructura MVC completa:
  - Controladores: TeamController.php y TeamInvitationController.php
  - Modelos: Team.php y TeamInvitation.php
  - Vistas organizadas en subcarpetas para mejor organización
- Nuevas tablas en la base de datos:
  - `teams`: Gestión de equipos
  - `team_user`: Relación muchos a muchos entre usuarios y equipos
  - `team_invitations`: Sistema de invitaciones a equipos
- Columnas adicionales en la tabla `users`:
  - `current_team_id` (BIGINT UNSIGNED NULL)
  - `profile_photo_path` (TEXT NULL)

### Modificado
- Actualizada la estructura del directorio del proyecto para seguir el patrón MVC
- Reorganización de las vistas siguiendo una estructura jerárquica clara

## Autor
- eze Chavez 

## [0.2.0] - 2024-03-20

### Agregado
- Actualización del esquema de base de datos con nuevas tablas y columnas
  - Tabla `users` con columnas mejoradas y restricciones
  - Tabla `teams` para gestión de equipos
  - Tabla `team_user` para relaciones entre equipos y usuarios
  - Tabla `team_invitations` para manejo de invitaciones
- Implementación de estructura MVC completa
  - Módulo de Autenticación (Auth)
    - Controladores: AuthController
    - Modelos: User
    - Vistas: login, register, profile
  - Módulo de Equipos (Teams)
    - Controladores: TeamController, TeamInvitationController
    - Modelos: Team, TeamInvitation
    - Vistas: create, show, settings

### Modificado
- Reorganización completa de la estructura del proyecto siguiendo el patrón MVC
- Actualización de la documentación del directorio del proyecto
- Estandarización de nombres de archivos y carpetas

### Técnico
- Todas las tablas ahora incluyen las columnas estándar:
  - edit_user_id
  - created_at
  - deleted_at
- Implementación de índices y claves foráneas para optimizar consultas
- Estructura de carpetas modular para mejor escalabilidad

## [0.1.0] - 2024-03-19

### Inicial
- Configuración inicial del proyecto
- Estructura básica de directorios
- Configuración de entorno de desarrollo

## Autor
- eze Chavez 

## [0.2.1] - 2024-04-24

### Corregido
- Eliminadas migraciones duplicadas:
  - Tabla `teams`
  - Tabla `team_user`
  - Tabla `team_invitations`
  - Columnas `two_factor` en users
- Corregido el orden de ejecución de las migraciones
- Solucionados problemas de PSR-4 en la estructura de directorios

### Tests
- Ejecutados exitosamente los tests de creación de equipos
- Verificada la funcionalidad de teams con 2 aserciones pasadas
- Tiempo de ejecución: 1.19s

### Autor
- eze Chavez 

### Changed
- Renombrada la rama principal de `master` a `main` para seguir las convenciones modernas de nomenclatura
- Autor: Eze Chavez
- Fecha: [Fecha actual]

### Pendiente
- Configurar la autenticación de GitHub con token de acceso personal para permitir push al repositorio remoto

## [Unreleased] - modulo2

### Added
- Creación de la rama `modulo2` para implementar la personalización del usuario
- Características planificadas:
  - Preferencias de tema (claro/oscuro)
  - Selección de idioma (es/en)
  - Persistencia de preferencias en base de datos
  - Carga automática de preferencias al iniciar sesión

### Author
- Eze Chavez