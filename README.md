## proyecto echo en laravel 11

## Instalacion

1. `Clonar el Repositorio o Descargarlo`

    **(https://github.com/Danskain/prueba_overall)**

2. `Entrar al Directorio del Proyecto`
   **cd nombre-del-proyecto**

3. `Instalar Dependencias con Composer`

    **composer install**

4. `Configurar el Archivo de Entorno`

Laravel utiliza un archivo .env para la configuración del entorno. Si el proyecto tiene un archivo .env.example, cópialo y renómbralo a .env:

cp .env.example .env

Luego, abre el archivo .env en un editor de texto y actualiza las configuraciones necesarias, como:

Asegúrate de configurar correctamente las siguientes variables en tu archivo `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_la_base_de_datos
DB_USERNAME=usuario_de_la_base_de_datos
DB_PASSWORD=contraseña_del_usuario


`no olvidar crear la base de datos con el mismo nombre de DB_USERNAME`

5. Generar la Clave de Aplicación

Ejecuta el siguiente comando para generar una clave de aplicación, que se almacenará en el archivo .env:

php artisan key:generate

6. Migrar la Base de Datos

php artisan migrate

7 correr los SEED para llenar las tablas

php artisan db:seed

8. Correr el Servidor de Desarrollo

php artisan serve

Esto iniciará el servidor en http://localhost:8000 por defecto.
```
