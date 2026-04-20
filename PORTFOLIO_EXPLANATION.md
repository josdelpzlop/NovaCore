# Documentación Técnica: Módulo Dinámico "Aprende"

Este documento detalla la implementación técnica del módulo de aprendizaje, destacando el uso del patrón de arquitectura **MVC (Modelo-Vista-Controlador)** y la integración con la base de datos MySQL.

## 1. Arquitectura MVC

El módulo "Aprende" sigue estrictamente el patrón MVC, separando la lógica de datos, la lógica de negocio y la interfaz de usuario.

### Modelo (Model) - `app/Models/Level.php`
Representa la estructura de los datos. Hemos creado un modelo `Level` que interactúa con la tabla `levels` en la base de datos.
- **Responsabilidad**: Abstraer la base de datos. Permite interactuar con la tabla `levels` como si fueran objetos PHP.
- **Características**: Define los campos rellenables (`$fillable`) como título, slug, insignia, descripción, etc.

### Controlador (Controller) - `app/Http/Controllers/LevelController.php`
Maneja la lógica de la petición del usuario.
- **Función `index()`**:
    1.  Recupera **todos** los niveles de la base de datos usando el modelo: `Level::all()`.
    2.  Pasa estos datos a la vista: `return view('learn.index', compact('levels'));`.
- **Responsabilidad**: Intermediario. Consulta al Modelo y entrega datos a la Vista.

### Vista (View) - `resources/views/learn/index.blade.php`
Se encarga de mostrar la información al usuario.
- **Dinámica**: No tiene textos "quemados" (hardcoded) para los niveles. Utiliza un bucle `@foreach ($levels as $level)` para generar una tarjeta HTML por cada nivel que exista en la base de datos.
- **Responsabilidad**: Presentación. Renderiza el HTML usando los datos que recibió del Controlador.

## 2. Base de Datos e Integración

La persistencia de datos se maneja a través de Migraciones y Seeders de Laravel.

### Migración - `database/migrations/..._create_levels_table.php`
Define el esquema de la base de datos mediante código (Infrastructure as Code).
- **Estructura**:
    - `id`: Identificador único.
    - `title`, `slug`, `badge`, `description`: Campos de contenido.
    - `timestamps`: Marcas de tiempo automáticas (`created_at`, `updated_at`).

### Seeder - `database/seeders/LevelSeeder.php`
Puebla la base de datos con datos iniciales de prueba o producción.
- **Datos generados**: "Sistema Solar", "Vida de las Estrellas", "Relatividad y Tiempo".
- **Beneficio**: Permite reiniciar la base de datos y tener contenido listo automáticamente sin ingresar datos manuales.

## 3. Flujo de Funcionamiento

1.  El usuario entra a `/aprende`.
2.  La **Ruta** llama a `LevelController@index`.
3.  El **Controlador** pide los niveles al **Modelo** `Level`.
4.  El **Modelo** hace la consulta SQL (`SELECT * FROM levels`) y devuelve objetos.
5.  El **Controlador** envía esos objetos a la **Vista**.
6.  La **Vista** genera el HTML dinámicamente y se lo envía al navegador del usuario.

## 4. Personalización de Autenticación (UI/UX) - "Cosmic Design"

Para mantener la coherencia visual con la temática espacial, reemplazamos las vistas por defecto de Laravel Breeze/Jetstream con diseños personalizados.

### Objetivo
Transformar el sistema de login/gestión de usuarios genérico en una experiencia inmersiva alineada con la marca "NovaCore".

# Documentación Técnica: Módulo Dinámico "Aprende"

Este documento detalla la implementación técnica del módulo de aprendizaje, destacando el uso del patrón de arquitectura **MVC (Modelo-Vista-Controlador)** y la integración con la base de datos MySQL.

## 1. Arquitectura MVC

El módulo "Aprende" sigue estrictamente el patrón MVC, separando la lógica de datos, la lógica de negocio y la interfaz de usuario.

### Modelo (Model) - `app/Models/Level.php`
Representa la estructura de los datos. Hemos creado un modelo `Level` que interactúa con la tabla `levels` en la base de datos.
- **Responsabilidad**: Abstraer la base de datos. Permite interactuar con la tabla `levels` como si fueran objetos PHP.
- **Características**: Define los campos rellenables (`$fillable`) como título, slug, insignia, descripción, etc.

### Controlador (Controller) - `app/Http/Controllers/LevelController.php`
Maneja la lógica de la petición del usuario.
- **Función `index()`**:
    1.  Recupera **todos** los niveles de la base de datos usando el modelo: `Level::all()`.
    2.  Pasa estos datos a la vista: `return view('learn.index', compact('levels'));`.
- **Responsabilidad**: Intermediario. Consulta al Modelo y entrega datos a la Vista.

### Vista (View) - `resources/views/learn/index.blade.php`
Se encarga de mostrar la información al usuario.
- **Dinámica**: No tiene textos "quemados" (hardcoded) para los niveles. Utiliza un bucle `@foreach ($levels as $level)` para generar una tarjeta HTML por cada nivel que exista en la base de datos.
- **Responsabilidad**: Presentación. Renderiza el HTML usando los datos que recibió del Controlador.

## 2. Base de Datos e Integración

La persistencia de datos se maneja a través de Migraciones y Seeders de Laravel.

### Migración - `database/migrations/..._create_levels_table.php`
Define el esquema de la base de datos mediante código (Infrastructure as Code).
- **Estructura**:
    - `id`: Identificador único.
    - `title`, `slug`, `badge`, `description`: Campos de contenido.
    - `timestamps`: Marcas de tiempo automáticas (`created_at`, `updated_at`).

### Seeder - `database/seeders/LevelSeeder.php`
Puebla la base de datos con datos iniciales de prueba o producción.
- **Datos generados**: "Sistema Solar", "Vida de las Estrellas", "Relatividad y Tiempo".
- **Beneficio**: Permite reiniciar la base de datos y tener contenido listo automáticamente sin ingresar datos manuales.

## 3. Flujo de Funcionamiento

1.  El usuario entra a `/aprende`.
2.  La **Ruta** llama a `LevelController@index`.
3.  El **Controlador** pide los niveles al **Modelo** `Level`.
4.  El **Modelo** hace la consulta SQL (`SELECT * FROM levels`) y devuelve objetos.
5.  El **Controlador** envía esos objetos a la **Vista**.
6.  La **Vista** genera el HTML dinámicamente y se lo envía al navegador del usuario.

## 4. Personalización de Autenticación (UI/UX) - "Cosmic Design"

Para mantener la coherencia visual con la temática espacial, reemplazamos las vistas por defecto de Laravel Breeze/Jetstream con diseños personalizados.

### Objetivo
Transformar el sistema de login/gestión de usuarios genérico en una experiencia inmersiva alineada con la marca "NovaCore".

### Implementación Técnica
Se modificó el flujo completo de autenticación para lograr una experiencia coherente. Esto abarcó la transformación de las siguientes vistas dentro de `resources/views/auth/`:
- Vistas principales: `login.blade.php` y `register.blade.php`
- Corrección y recuperación: `forgot-password.blade.php` y `reset-password.blade.php`
- Seguridad de cuenta: `verify-email.blade.php` y `confirm-password.blade.php`

1.  **Integración de Diseño**: Se inyectó código HTML/CSS personalizado (efectos de Glassmorphism, gradientes espaciales, tipografía moderna) directamente en las vistas Blade, garantizando un aspecto unificado en todos los puntos de contacto.
2.  **Preservación de Lógica**: Mantuvimos las directivas clave de Blade para que el backend de Laravel siga funcionando:
    - `@csrf`: Para protección contra ataques Cross-Site Request Forgery.
    - `x-auth-session-status` / `$errors`: Para mostrar mensajes de éxito o error con estilos personalizados.
    - `old('email')`: Para repoblar formularios en caso de error.
    - `route('login')` y `route('register')`: Uso de Named Routes para mantener la consistencia.

### Resultado
El usuario tiene una experiencia de "entrada a la nave" consistente, pero toda la seguridad (encriptación, sesiones) sigue siendo manejada por el núcleo robusto de Laravel.

## 5. Gamificación, Gestión de CMS y Progreso (Fases 1, 2 y 3)

Para convertir NovaCore de un portal de información a una Academia Interactiva completa, hemos desarrollado un panel de control personalizado (CMS) y un motor de base de datos para el seguimiento del aprendizaje.

### 5.1. Seguridad y Autenticación del Administrador (Fase 1)
- **Database Mod**: Se añadió la columna `role` a la tabla de `users`. Por seguridad, se extrajo del `$fillable` de los modelos para prevenir vulnerabilidades de asignación masiva (*mass-assignment vulnerabilities*).
- **Control de Acceso**: Creamos un componente de validación `EnsureUserIsAdmin` (Middleware) que intercepta todas las peticiones a la ruta `/admin` y prohíbe el acceso a cualquier usuario con nivel 'estudiante', emitiendo un Error HTTP 403.

### 5.2. Panel de Control "Cosmic CMS" (Fase 2)
Se desarrolló un CRUD (Create, Read, Update, Delete) completo sin recurrir a paquetes preconstruidos.
- **UI/UX Aislada**: Se diseñó una plantilla Blade independiente (`layouts/admin.blade.php`) usando CSS puro centrado en el tema espacial con *Glassmorphism*. 
- **Controladores Resource**: Creación de `Admin\LevelController` y `Admin\LessonController` para procesar de manera segura todas las operaciones de la base de datos de administración.

### 5.3. Interfaz de Estudiante y Motor de Gamificación (Fase 3)
La base funcional de la Academia y la experiencia del usuario.
- **Estructura de Datos Pivot (`belongsToMany`)**: Se implementó una tabla intermedia `lesson_user` usando el ORM *Eloquent*. Esto permite generar una relación de "muchos a muchos", registrando de forma inmutable qué lección específica ha completado cada usuario, junto con su timestamp (`created_at`).
- **Navegación Lógica (Routing Pipeline)**: El `LessonController` público no solo renderiza el material, sino que en la vía de finalización (`POST`), registra el avance y mediante un algoritmo lógico (*where order > actual\_order*) detecta la siguiente lección cronológica, encauzando al estudiante hacia ella de manera automática para maximizar la retención.

## 6. Ecosistema de Conectividad REST (Arquitectura de 3 APIs)

Para dotar al proyecto de interacción del mundo real, se han implementado tres APIs externas distintas, abordadas cada una con una estrategia técnica diferente para demostrar dominio del paradigma *Full-Stack*:

### 6.1. Consumo Backend y Mutación de Respuesta (NASA APOD + Traductor Google)
En lugar de una simple petición, se desarrolló un sistema donde el backend de Laravel intercepta la foto astronómica diaria (APOD) de la NASA.
- **Lógica Secundaría Compartida (`Traits`)**: Puesto que las APIs aeroespaciales operan estadísticamente en inglés, se programó el Trait `TranslatesText` que intercepta las respuestas JSON originales y las reenvía dinámicamente de forma interna a una API no documentada de Google Translate, devolviéndolas parseadas en español en tiempo real.
- **Optimización por Caché**: Para evitar el agotamiento de cuotas gratuitas, la petición HTTP en PHP está envuelta en la fachada `Cache::remember()`, persistiendo el objeto resultante en memoria durante 12 horas.

### 6.2. Agregación de Orígenes de Datos (BBDD Propia + TheSpaceDevs API)
En la lógica del controlador `EventController`, se elaboró un patrón de "Data Aggregation".
- La vista de Eventos consume datos de la relación local MySQL (clases y tutoriales de NovaCore) y datos de la API global TheSpaceDevs (Próximo lanzamiento del mundo real) simultáneamente.
- **Troubleshooting**: Se identificó y resolvió proactivamente el problema de mantenimiento asociado a la API *v5 antigua de SpaceX*, derivando el *Endpoint* hacia un servicio robusto como *The Space Devs* para garantizar la fiabilidad del dato espacial sin sacrificar la interfaz de usuario.

### 6.3. Asincronismo Frontend Píxel a Píxel (ISS Tracker JS)
Se reconoció que el paradigma de PHP y el renderizado estático de Blade es insuficiente para recursos de alta velocidad como las coordenadas de rotación orbital de la ISS (cambian constantemente por milisegundos).
- Para solucionar esto sin bloquear el hilo principal de Laravel, se montó el Widget "ISS Terminal" en la vista raíz.
- Usa la **API Fetch de JavaScript** de manera asíncrona mediante un bucle `setInterval()` iterando cada 2 segundos. Con ello, el Document Object Model (DOM) es manipulado y la información parpadea sin requerir la intervención del servidor Apache/Nginx principal.