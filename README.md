# Proyecto de Gestión de Videojuegos (Proyecto programación 2ª evaluación, hecho por Alex Martínez Martins)

Aplicación web desarrollada en PHP siguiendo el patrón **MVC** para la gestión de un catálogo de videojuegos (Acción y Terror) con sistema de usuarios y personalización de interfaz. Se ha aplicado lo siguiente:
herencia de 2 subclases con una clase madre, conexión a base de datos mediante **PDO**, **CRUD** (Create, Read, Update, Delete), patrón **Singleton** para la conexión a la base de datos, autenticación de usuarios,
y persistencia de credenciales de usuario (en este caso he añadido la funcionalidad de tema claro u oscuro para el fondo).

##  Estructura de Ficheros

El proyecto se organiza de la siguiente manera para separar la lógica, los datos y la presentación:

*   **`controllers/`**: Gestión de las peticiones del usuario y coordinación entre modelos y vistas (`UsuarioController.php`, `VideojuegoController.php`).
*   **`models/`**: Lógica de negocio, objetos y acceso a datos (`Gestor.php`, `Videojuego.php`, `Connection.php`, `Usuario.php`).
*   **`views/`**: Interfaz de usuario, incluyendo formularios y listados (`listar.php`, `login.php`, `editar.php`).
*   **`index.php`**: Punto de entrada principal (Front Controller) que arranca la sesión y enruta las acciones.
*   **`conf.json`**: Configuración de credenciales de la base de datos.
*   **`docker-compose.yml`**: Configuración de la infraestructura (Apache, PHP y MySQL).

##  Despliegue con Docker y VS Code

Sigue estos pasos para levantar el entorno gráfico de forma sencilla:

### 1. Preparación
*   Asegúrate de tener instalado **Docker Desktop** y que esté en ejecución.
*   Abre la carpeta del proyecto en **Visual Studio Code**.

### 2. Levantar la infraestructura
Existen dos formas de hacerlo desde **Visual Studio Code**:
* **Opción A (Terminal)**: Abre una terminal integrada (**Terminal > New Terminal**), escribe el comando `docker-compose up -d` y pulsa `Enter`.
* **Opción B (Interfaz)**: Haz clic derecho sobre el archivo `docker-compose.yml` y selecciona la opción **Compose Up**.

    *Este proceso descargará las imágenes necesarias y arrancará los contenedores automáticamente.*

### 3. Gestión desde el entorno gráfico
*   **Docker Desktop**: Verás aparecer un nuevo grupo de contenedores. Desde aquí puedes verificar que los servicios `db` y `web` están en verde (Running).
*   **VS Code**: Si tienes la extensión de Docker, podrás gestionar los contenedores desde la barra lateral.

### 4. Acceso a la aplicación
*   Una vez que los contenedores estén funcionando, abre tu navegador y accede a:
    `http://localhost:8080`.
