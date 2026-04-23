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

## 7. Gamificación Avanzada: Experiencia (XP) y Sistema de Títulos Equipables

Para maximizar la retención de usuarios e incentivar el aprendizaje continuo, se ha implementado un sistema completo de gamificación y economía de experiencia.

### 7.1. Motor de Experiencia y Rangos (Lógica de Modelo)
Se ha extendido el modelo `User` para albergar la lógica de progresión sin necesidad de crear tablas adicionales complejas.
- **Atributos de Progresión (`Accessors`)**: Mediante métodos mágicos (Accessors) como `getUserLevelAttribute()` y `getXpProgressAttribute()`, el sistema calcula dinámicamente el nivel del usuario (de 0 a MAX) y el porcentaje exacto de progreso hacia el siguiente nivel basándose en su XP actual.
- **Identidad Visual Centralizada**: Cada rango cuenta con su propia identidad visual y de color. Esta paleta de colores y la iconografía vectorial (SVG) se gestionan de forma centralizada en un diccionario estático en el modelo `User` (`$achievementData`), permitiendo coherencia de diseño en toda la aplicación.

### 7.2. Evaluación de Logros en Tiempo Real
El controlador `RewardController` se encarga de auditar el progreso del usuario.
- En lugar de procesos pesados en base de datos (Cron Jobs), el sistema evalúa las métricas de rendimiento (ej. lecciones completadas, eventos asistidos mediante la tabla pivote `event_user`) *al vuelo* cuando el usuario accede a su panel de recompensas.
- Si se cumplen las condiciones, el front-end desbloquea automáticamente las tarjetas usando clases CSS condicionales y habilitando nuevas interacciones.

### 7.3. Equipamiento de Títulos Transversal (UI/UX Dinámica)
Se ha desarrollado una funcionalidad "Equipable", permitiendo al usuario exhibir su progreso como marca de estatus en toda la web.
- **Persistencia**: Se ha añadido el campo `current_title` a la tabla `users`. Al hacer clic en "Equipar" en la vista, una ruta POST actualiza este valor en el modelo.
- **Propagación en la Interfaz**: Dado que la entidad autenticada (`Auth::user()`) está disponible globalmente, el título equipado y su correspondiente insignia se inyectan dinámicamente en el Layout Principal (`master.blade.php`) y en el panel de control. Esto modifica reactivamente el color del nombre del usuario y le otorga "badges" exclusivos dependiendo de sus hazañas espaciales.

## 8. Identidad Visual Dinámica y "Cosmic HUD" (Fase de Pulido UI)

La última fase del desarrollo se centró en unificar la experiencia visual utilizando CSS puro avanzado y lógicas de enrutamiento en el motor Blade, dotando a NovaCore de una estética inmersiva de "Interfaz de Nave Espacial" (HUD).

### 8.1. Arquitectura "Bento Grid" y Responsive Avanzado
Se abandonaron las estructuras clásicas centradas de "tarjeta única" (formularios típicos) en favor del patrón de diseño moderno **Bento Grid** (Mosaicos Fluidos).
- **Distribución Espacial:** Tanto el Panel de Mando (`Dashboard`) como la sala de Recompensas utilizan CSS Grid nativo (`grid-template-columns`) y Flexbox (`flex: 1 1 Xpx`) para crear ecosistemas de datos panorámicos (hasta 1400px de ancho) que aprovechan el 100% de la pantalla.
- **Micro-interacciones:** Las tarjetas de estadística incluyen interacciones de `transform: translateY` combinadas con luces `box-shadow` al hacer `hover`. En el módulo en vivo del *ISS Tracker*, se forzó un renderizado de grilla matemática estricta (`repeat(4, 1fr)`) mitigando comportamientos erráticos del DOM en resoluciones altas (1080p+).

### 8.2. Enrutamiento Temático Dinámico (Blade State Logic)
Para aumentar la inmersión, la paleta cromática de la plataforma muta activamente dependiendo de la ruta en la que se navegue, demostrando dominio en el ciclo de vida de peticiones MVC.
- En el Layout principal (`master.blade.php`), se programó un controlador de estado visual in-line evaluando el *Facade* `request()->routeIs()`.
- Este sistema intercepta la petición y define una variable `$themeColor` adaptada a la ruta (ej. Rojo Carmesí para Fenómenos, Dorado para Recompensas, Magenta para Eventos).
- Esta única variable se inyecta por todo el árbol DOM, propagando el color hacia el logotipo con máscaras CSS (`-webkit-background-clip: text`), cambiando el tinte de los bordes del pie de página y manipulando los selectores `hover` de navegación. Todo renderizado desde el servidor (SSR), sin coste de rendimiento en JS del lado del cliente.

### 8.3. Tintado de Entorno Vinculado a Base de Datos
El Dashboard se convirtió en una proyección visual interactiva del nivel del jugador.
- Se implementaron fondos fijos con orbes de luz pulsante (`radial-gradient` y `@keyframes pulseGlow`) cuyo color base no está predefinido en CSS, sino que se extrae en vivo del atributo del modelo del usuario (`$user->user_level_color`).
- Esto significa que la atmósfera visual completa del panel de control mutará si el Administrador rebaja los XP del usuario en base de datos, o si este sube de rango por sus propios medios, demostrando una conexión total entre la base de datos de backend y la capa de estilización frontend (CSS in JS/Blade).