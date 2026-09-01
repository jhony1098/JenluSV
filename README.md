# Jenlu SV

Tienda de regalos construida con PHP, MySQL y una estructura MVC ligera.

## Abrir el proyecto

1. Enciende **Apache** y **MySQL** desde XAMPP.
2. Abre `http://localhost/jenlusv/`.
3. La base de datos local se llama `jenlu_sv` y ya fue importada en este equipo.

## Base de datos en otro equipo

En phpMyAdmin, selecciona **Importar** y elige `database/jenlu_sv.sql`.
La conexión se configura en `config/database.php`; por defecto usa el usuario `root` sin contraseña, como XAMPP.

## Actualización de reseñas

Si ya habías creado la base antes de esta mejora, en phpMyAdmin selecciona la base `jenlu_sv`, abre la pestaña **Importar** y carga `database/migrations/002_product_reviews.sql`. Esto crea la tabla para las reseñas con estrellas.

## Estructura

- `app/Models/Product.php`: consultas a productos e imágenes.
- `app/Controllers/ApiController.php`: catálogo y bolsa de sesión.
- `app/views/home.php`: vista principal y experiencia de compra.
- `database/jenlu_sv.sql`: tablas, relaciones y datos iniciales.

Para añadir productos desde phpMyAdmin usa `products`, selecciona una categoría existente en `categories` y agrega sus fotos en `product_images`.
