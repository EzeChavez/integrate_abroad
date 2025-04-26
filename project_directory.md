# Estructura del Directorio del Proyecto

## Módulo de Preferencias de Usuario
```
app/Modules/UserPreferences/
├── Controllers/
│   └── UserPreferenceController.php
├── Models/
│   └── UserPreference.php
└── Views/
    └── Index.vue
```

### Descripción de los Archivos

#### Controllers
- `UserPreferenceController.php`: Gestiona las preferencias del usuario (tema y idioma)
  - Métodos:
    - `index()`: Muestra la página de preferencias
    - `update()`: Actualiza las preferencias del usuario

#### Models
- `UserPreference.php`: Modelo para manejar las preferencias del usuario
  - Campos:
    - `theme`: Preferencia de tema (light/dark)
    - `language`: Preferencia de idioma (es/en)
  - Relaciones:
    - `user()`: Pertenece a un usuario
    - `editUser()`: Usuario que realizó la última edición

#### Views
- `Index.vue`: Vista principal de preferencias
  - Componentes:
    - Selector de tema (claro/oscuro)
    - Selector de idioma (español/inglés)
    - Botón de guardado

### Autor
- Eze Chavez

```
├── app/
│   ├── Modules/
│   │   ├── Auth/
│   │   │   ├── Controllers/
│   │   │   │   └── AuthController.php
│   │   │   ├── Models/
│   │   │   │   └── User.php
│   │   │   └── Views/
│   │   │       ├── login.blade.php
│   │   │       ├── register.blade.php
│   │   │       └── Profile/
│   │   │           ├── show.blade.php
│   │   │           └── settings.blade.php
│   │   └── Teams/
│   │       ├── Controllers/
│   │       │   ├── TeamController.php
│   │       │   └── TeamInvitationController.php
│   │       ├── Models/
│   │       │   ├── Team.php
│   │       │   └── TeamInvitation.php
│   │       └── Views/
│   │           ├── create.blade.php
│   │           ├── show.blade.php
│   │           └── Settings/
│   │               ├── members.blade.php
│   │               └── general.blade.php
├── config/
│   ├── app.php
│   └── database.php
├── database/
│   ├── migrations/
│   │   ├── 2024_03_20_000000_create_users_table.php
│   │   ├── 2024_03_20_000001_create_teams_table.php
│   │   ├── 2024_03_20_000002_create_team_user_table.php
│   │   └── 2024_03_20_000003_create_team_invitations_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── public/
│   └── index.php
├── resources/
│   ├── css/
│   └── js/
├── routes/
│   ├── api.php
│   └── web.php
├── storage/
│   └── app/
├── tests/
├── vendor/
├── .env
├── .env.example
├── .gitignore
├── composer.json
├── package.json
├── README.md
├── Changelog.md
├── database_schema.md
└── project_directory.md
```

## Autor
- eze Chavez
