# CRUD Estudiantes — Laravel 12 + Tailwind CSS

Sistema de gestión de estudiantes desarrollado con Laravel 12 y Tailwind CSS como parte de la actividad de la Unidad 2.

**Alumno:** [Tu nombre]  
**Materia:** Páginas Web  
**Semestre:** 6to

---

## Descripción

Aplicación web que implementa un CRUD completo para gestionar estudiantes y carreras, aplicando la arquitectura MVC de Laravel.

### Funcionalidades

- **Carreras:** Registrar, listar, editar y eliminar carreras (con clave única).
- **Estudiantes:** Registrar, listar, editar y eliminar estudiantes.
- Cada estudiante tiene: nombre, correo, carrera (relación) y semestre.
- Validación de formularios con mensajes de error en pantalla.
- Mensajes de éxito/error en cada operación.
- Layout base compartido entre todas las vistas.

---

## Requisitos

- PHP 8.2+
- Composer
- Node.js + npm
- MySQL (o cualquier base de datos compatible con Laravel)

---

## Instalación

```bash
# 1. Clonar el repositorio
git clone <url-del-repo>
cd crud-estudiantes

# 2. Instalar dependencias PHP
composer install

# 3. Instalar dependencias JS
npm install

# 4. Copiar y configurar el archivo de entorno
cp .env.example .env
php artisan key:generate
```

Edita `.env` con tus credenciales de base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_estudiantes
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```

```bash
# 5. Crear la base de datos y ejecutar migraciones
php artisan migrate

# 6. Compilar assets (Tailwind CSS)
npm run build

# 7. Iniciar el servidor de desarrollo
php artisan serve
```

Abre [http://localhost:8000](http://localhost:8000) en tu navegador.

---

## Estructura del proyecto

```
app/
  Http/Controllers/
    CarreraController.php     # CRUD de carreras
    EstudianteController.php  # CRUD de estudiantes
  Models/
    Carrera.php               # Modelo con relación hasMany
    Estudiante.php            # Modelo con relación belongsTo

database/migrations/
  ..._create_carreras_table.php
  ..._create_estudiantes_table.php

resources/views/
  layouts/app.blade.php       # Layout base con navbar
  carreras/
    index.blade.php
    create.blade.php
    edit.blade.php
  estudiantes/
    index.blade.php
    create.blade.php
    edit.blade.php

routes/web.php                # Rutas resource para ambos módulos
```

---

## Rutas disponibles

| Método | URI | Descripción |
|--------|-----|-------------|
| GET | /estudiantes | Listar estudiantes |
| GET | /estudiantes/create | Formulario nuevo estudiante |
| POST | /estudiantes | Guardar estudiante |
| GET | /estudiantes/{id}/edit | Formulario editar |
| PUT | /estudiantes/{id} | Actualizar estudiante |
| DELETE | /estudiantes/{id} | Eliminar estudiante |
| GET | /carreras | Listar carreras |
| GET | /carreras/create | Formulario nueva carrera |
| POST | /carreras | Guardar carrera |
| GET | /carreras/{id}/edit | Formulario editar |
| PUT | /carreras/{id} | Actualizar carrera |
| DELETE | /carreras/{id} | Eliminar carrera |
