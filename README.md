# 🌌 NovaCore — Academia Estelar & Plataforma de Gamificación Espacial

![NovaCore Banner](https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200&auto=format&fit=crop)

**NovaCore** es una plataforma educativa inmersiva y un sistema de gamificación desarrollado como **Proyecto Final para el ciclo superior de Desarrollo de Aplicaciones Web (2º de DAW)**. 

El objetivo principal es acercar la astronomía y la exploración espacial a los usuarios mediante un entorno visualmente espectacular (estética *Cosmic Dark Mode*), lecciones interactivas, telemetría real en vivo y un robusto sistema de progresión y recompensas.

---

## ✨ Características Principales

### 📚 1. Academia Estelar (Aprender)
- **Rutas de Aprendizaje:** Sistema estructurado por niveles (ej. *Sistema Solar*, *Vida de las Estrellas*, *Cosmología*).
- **Lecciones Enriquecidas:** Integración nativa de lecturas teóricas, vídeos didácticos y cuestionarios de evaluación (*Quizzes*).
- **Asimilación de Conocimiento:** Seguimiento individualizado de lecciones completadas para cada alumno.

### 🛰️ 2. Telemetría y APIs Reales en Vivo
- **NASA APOD:** Consumo directo de la API de la NASA para la *Fotografía Astronómica del Día*, con histórico cacheado.
- **Radar SpaceX & Lanzamientos:** Conexión con la API de *TheSpaceDevs* para mostrar el contador (T-Minus) y streamings del próximo lanzamiento mundial.
- **Rastreador ISS:** Seguimiento óptico y posicional de la Estación Espacial Internacional en tiempo real.

### 🎮 3. Sistema de Gamificación
- **Puntos de Experiencia (XP):** Recompensas por completar misiones, registrarse en eventos y superar evaluaciones.
- **Rangos Dinámicos:** Escalafón automático desde *Explorador Novato* hasta *Ente Espacial*, con cambio de identidad visual y colores de interfaz.
- **Recompensas Equipables:** Títulos y medallas cósmicas para personalizar el perfil público.

### 🛡️ 4. Panel de Control de Administración
- **Gestión Intuitiva:** Creación, edición y borrado (CRUD) de niveles y lecciones.
- **Editor WYSIWYG Integrado:** Uso de **QuillJS** para redactar el contenido de las lecciones sin necesidad de programar etiquetas HTML.
- **Mantenimiento Autónomo:** Uso de *Accessors* de Laravel para cerrar de forma desatendida las misiones y eventos cuya fecha ya haya expirado.

---

## 🛠️ Tecnologías Utilizadas

- **Backend:** PHP 8.x, Framework **Laravel 10** (Eloquent ORM, Middlewares, Accessors, Caché, HTTP Client).
- **Frontend:** HTML5 semántico, **CSS nativo ultra-personalizado** (variables CSS, flexbox/grid, micro-animaciones, diseño adaptable) y JavaScript puro (Vanilla JS).
- **Base de Datos:** MySQL / MariaDB con relaciones complejas y esquemas migrados.
- **Librerías del Cliente:** QuillJS (Editor WYSIWYG).

---

## ⚙️ Instalación Local (Guía Rápida)

Sigue estos pasos para desplegar la plataforma en tu entorno de desarrollo local (ej. Laragon o XAMPP):

### 1. Clonar el repositorio e instalar dependencias
```bash
git clone https://github.com/josdelpzlop/NovaCore.git
cd NovaCore
composer install
npm install
```

### 2. Configurar el Entorno
Copia el archivo de ejemplo para crear tu configuración de entorno propia:
```bash
cp .env.example .env
php artisan key:generate
```
*(Asegúrate de configurar los parámetros de conexión a tu base de datos local `DB_DATABASE`, `DB_USERNAME`, etc., dentro del archivo `.env`)*.

### 3. Migrar y Poblar la Base de Datos
El proyecto incluye un completo juego de datos de prueba precargados (niveles, lecciones con imágenes de alta calidad, fenómenos y rangos). Lánzalo con:
```bash
php artisan migrate:fresh --seed
```

---

## 🔑 Credenciales de Prueba por Defecto

Para facilitar la revisión y corrección del proyecto, el seeder genera automáticamente dos cuentas listas para usar:

| Rol | Email | Contraseña | XP Inicial | Rango |
| :--- | :--- | :--- | :--- | :--- |
| **Administrador** | `admin@novacore.com` | `12345678` | 2500 XP | Ente Espacial (MAX) |
| **Estudiante** | `estudiante@novacore.com` | `12345678` | 0 XP | Explorador Novato |

---

## 👨‍💻 Autor y Licencia
Desarrollado por **José Manuel** como proyecto académico para la obtención del título de Técnico Superior en Desarrollo de Aplicaciones Web (DAW). 

Distribuido bajo la licencia MIT. Eres libre de usar, estudiar y modificar este código.
