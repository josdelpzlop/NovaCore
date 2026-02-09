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
Se modificaron los archivos `resources/views/auth/login.blade.php` y `register.blade.php`.
1.  **Integración de Diseño**: Se inyectó HTML/CSS personalizado (Glassmorphism, gradientes radiales, tipografía Inter) directamente en las vistas Blade.
2.  **Preservación de Lógica**: Mantuvimos las directivas clave de Blade para que el backend de Laravel siga funcionando:
    - `@csrf`: Para protección contra ataques Cross-Site Request Forgery.
    - `x-auth-session-status` / `$errors`: Para mostrar mensajes de éxito o error con estilos personalizados.
    - `old('email')`: Para repoblar formularios en caso de error.
    - `route('login')` y `route('register')`: Uso de Named Routes para mantener la consistencia.

### Resultado
El usuario tiene una experiencia de "entrada a la nave" consistente, pero toda la seguridad (encriptación, sesiones) sigue siendo manejada por el núcleo robusto de Laravel.
