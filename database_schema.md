# Esquema de Base de Datos
Autor: Eze Chavez
Fecha de última actualización: {{ date('Y-m-d') }}

## Convenciones Generales
- Todas las tablas incluyen las siguientes columnas:
  - `edit_user_id`: ID del último usuario que modificó el registro
  - `created_at`: Timestamp de creación
  - `deleted_at`: Timestamp de eliminación (soft delete)

## Módulos

### Autenticación (auth)
#### Tabla: users
- Descripción: Almacena la información de los usuarios del sistema
- Columnas:
  - `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
  - `name` VARCHAR(255) NOT NULL
  - `email` VARCHAR(255) NOT NULL UNIQUE
  - `email_verified_at` TIMESTAMP NULL
  - `password` VARCHAR(255) NOT NULL
  - `remember_token` VARCHAR(100) NULL
  - `current_team_id` BIGINT UNSIGNED NULL
  - `profile_photo_path` TEXT NULL
  - `edit_user_id` BIGINT UNSIGNED NOT NULL
  - `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  - `deleted_at` TIMESTAMP NULL
- Índices:
  - PRIMARY KEY (`id`)
  - UNIQUE INDEX `users_email_unique` (`email`)

#### Tabla: password_reset_tokens
- Descripción: Tokens para restablecimiento de contraseñas
- Columnas:
  - `email` VARCHAR(255) NOT NULL
  - `token` VARCHAR(255) NOT NULL
  - `created_at` TIMESTAMP NULL
- Índices:
  - PRIMARY KEY (`email`)

#### Tabla: sessions
- Descripción: Sesiones activas de usuarios
- Columnas:
  - `id` VARCHAR(255) PRIMARY KEY
  - `user_id` BIGINT NULL
  - `ip_address` VARCHAR(45) NULL
  - `user_agent` TEXT NULL
  - `payload` TEXT NOT NULL
  - `last_activity` INT NOT NULL
  - Columnas estándar (created_at, updated_at, deleted_at, edit_user_id)
- Índices:
  - PRIMARY KEY (`id`)
  - INDEX `sessions_user_id_index` (`user_id`)
  - INDEX `sessions_last_activity_index` (`last_activity`)

## Relaciones
### Módulo de Autenticación
- `sessions.user_id` -> `users.id` (FOREIGN KEY)
- `password_reset_tokens.email` -> `users.email` (Relación lógica, no FK)

## Índices
### Módulo de Autenticación
#### users
- `users_email_unique`: UNIQUE(`email`)
- `users_edit_user_id_foreign`: INDEX(`edit_user_id`)

#### password_reset_tokens
- `password_reset_tokens_edit_user_id_foreign`: INDEX(`edit_user_id`)

#### sessions
- `sessions_user_id_index`: INDEX(`user_id`)
- `sessions_last_activity_index`: INDEX(`last_activity`)
- `sessions_edit_user_id_foreign`: INDEX(`edit_user_id`)

## Módulo de Equipos

### teams
- Descripción: Almacena la información de los equipos del sistema
- Columnas:
  - `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
  - `name` VARCHAR(255) NOT NULL
  - `user_id` BIGINT UNSIGNED NOT NULL
  - `personal_team` BOOLEAN NOT NULL
  - `edit_user_id` BIGINT UNSIGNED NOT NULL
  - `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  - `deleted_at` TIMESTAMP NULL
  - FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
  - FOREIGN KEY (`edit_user_id`) REFERENCES `users` (`id`)
- Índices:
  - PRIMARY KEY (`id`)
  - INDEX `teams_user_id_index` (`user_id`)

### team_user
- Descripción: Almacena la información de los miembros del equipo
- Columnas:
  - `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
  - `team_id` BIGINT UNSIGNED NOT NULL
  - `user_id` BIGINT UNSIGNED NOT NULL
  - `role` VARCHAR(255) NOT NULL
  - `edit_user_id` BIGINT UNSIGNED NOT NULL
  - `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  - `deleted_at` TIMESTAMP NULL
  - FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
  - FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
  - FOREIGN KEY (`edit_user_id`) REFERENCES `users` (`id`)
- Índices:
  - PRIMARY KEY (`id`)
  - INDEX `team_user_team_id_index` (`team_id`)
  - INDEX `team_user_user_id_index` (`user_id`)

### team_invitations
- Descripción: Almacena la información de las invitaciones a los equipos
- Columnas:
  - `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
  - `team_id` BIGINT UNSIGNED NOT NULL
  - `email` VARCHAR(255) NOT NULL
  - `role` VARCHAR(255) NOT NULL
  - `token` VARCHAR(40) NOT NULL UNIQUE
  - `edit_user_id` BIGINT UNSIGNED NOT NULL
  - `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  - `deleted_at` TIMESTAMP NULL
  - FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
  - FOREIGN KEY (`edit_user_id`) REFERENCES `users` (`id`)
- Índices:
  - PRIMARY KEY (`id`)
  - INDEX `team_invitations_team_id_index`