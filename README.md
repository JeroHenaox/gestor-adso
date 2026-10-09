# Gestor ADSO

## 1. Descripción del proyecto

**Gestor ADSO** es un proyecto desarrollado con PHP y Laravel para la actividad **Semana 1 — Instalación y primer arranque**, del programa de formación Análisis y Desarrollo de Software (ADSO) del SENA.

El objetivo de esta etapa es preparar el entorno de desarrollo, verificar las herramientas necesarias, crear la estructura inicial de Laravel y utilizar Git para llevar el control de versiones.

En esta primera fase se trabaja con la estructura base del framework y sus migraciones iniciales. Las funcionalidades específicas del gestor se desarrollarán en las siguientes etapas.

## 2. Información del entorno

Las versiones verificadas en el equipo son:

| Herramienta        | Versión          |
| ------------------ | ---------------- |
| PHP                | 8.2.12           |
| Composer           | 2.10.3           |
| Laravel Framework  | 12.69.3          |
| Git                | 2.54.0.windows.1 |
| Visual Studio Code | 1.137.0          |
| Sistema operativo  | Windows          |

**Ruta local del proyecto:**

`C:\Users\jerox\Documents\gestor-adso`

## 3. Requisitos previos

Para trabajar con el proyecto se necesitan:

* PHP con las extensiones requeridas por Laravel.
* Composer para administrar las dependencias de PHP.
* Git para el control de versiones.
* Visual Studio Code u otro editor de código.
* MySQL y phpMyAdmin mediante XAMPP, si se utiliza MySQL como base de datos.

### Verificar las herramientas

Abrir PowerShell y ejecutar:

```powershell
php -v
composer -V
git --version
code --version
```

Para comprobar la versión de Laravel, ingresar a la carpeta del proyecto y ejecutar:

```powershell
php artisan --version
```

## 4. Crear o abrir el proyecto

### Crear el proyecto desde cero

Este procedimiento se utiliza solamente cuando el proyecto todavía no existe:

```powershell
cd "$env:USERPROFILE\Documents"
composer create-project laravel/laravel gestor-adso
cd gestor-adso
php artisan --version
```

### Abrir el proyecto existente

En este caso, el proyecto ya está creado. Para continuar trabajando, ejecutar:

```powershell
cd "$env:USERPROFILE\Documents\gestor-adso"
code .
```

No es necesario volver a crear el proyecto si ya existe en esa ubicación.

## 5. Instalar las dependencias

Cuando se trabaja con una copia existente del proyecto, instalar las dependencias registradas en `composer.lock`:

```powershell
composer install
```

Este comando permite instalar los paquetes necesarios para que Laravel funcione.

## 6. Configurar las variables de entorno

El archivo `.env` contiene la configuración local de la aplicación. Si no existe, se puede crear desde el archivo de ejemplo:

```powershell
Copy-Item .env.example .env
```

Si la aplicación todavía no tiene una clave válida, generar una con:

```powershell
php artisan key:generate
```

Las variables principales utilizadas por Laravel incluyen:

* `APP_NAME`
* `APP_ENV`
* `APP_KEY`
* `APP_DEBUG`
* `APP_URL`
* `DB_CONNECTION`
* `DB_HOST`
* `DB_PORT`
* `DB_DATABASE`
* `DB_USERNAME`
* `DB_PASSWORD`

Para utilizar MySQL, configurar las variables de conexión según las credenciales reales del equipo. Un ejemplo de configuración local es:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_adso
DB_USERNAME=root
DB_PASSWORD=
```

La contraseña vacía solo se debe utilizar si el usuario local de MySQL realmente no tiene contraseña.

**Seguridad:** el archivo `.env` no debe publicarse en GitHub. El repositorio debe incluir `.env.example`, sin contraseñas ni claves privadas.

## 7. Configurar MySQL

### Paso 1. Iniciar MySQL

1. Abrir el panel de control de XAMPP.
2. Iniciar el servicio MySQL.
3. Confirmar que esté funcionando.

### Paso 2. Crear la base de datos

1. Abrir `http://localhost/phpmyadmin`.
2. Crear una base de datos llamada `gestor_adso`.

También se puede crear mediante SQL:

```sql
CREATE DATABASE gestor_adso
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Si la base de datos ya existe, no es necesario crearla nuevamente.

### Paso 3. Limpiar la configuración

Después de modificar `.env`, ejecutar desde la carpeta del proyecto:

```powershell
php artisan config:clear
```

### Paso 4. Ejecutar las migraciones

```powershell
php artisan migrate
```

Laravel ejecutará las migraciones pendientes y creará las tablas definidas en los archivos de `database/migrations`.

El resultado se debe comprobar en la terminal y en phpMyAdmin. La conexión con MySQL solo se considera verificada cuando las migraciones terminan correctamente usando esa base de datos.

**Precaución:** `php artisan migrate:fresh` elimina todas las tablas existentes en la base de datos seleccionada. No se debe ejecutar si hay información que se quiera conservar.

## 8. Ejecutar la aplicación

Desde la carpeta raíz del proyecto, ejecutar:

```powershell
php artisan serve
```

Laravel mostrará la dirección local del servidor. Normalmente es:

`http://127.0.0.1:8000`

Abrir esa dirección en el navegador para comprobar que la aplicación responde.

Para detener el servidor, presionar `Ctrl + C` en la terminal donde se está ejecutando.

## 9. Control de versiones con Git

El repositorio local se inicializó utilizando la rama principal `main`.

El primer commit registrado es:

* **Identificador:** `89f1d70`
* **Mensaje:** `Semana 1: Entorno listo + Laravel base`

Para consultar el estado de los archivos y el historial de cambios, utilizar:

```powershell
git status
git log -1 --oneline
```

Antes de agregar archivos, comprobar que `.env` esté siendo ignorado:

```powershell
git check-ignore .env
```

El resultado esperado es `.env`. Si no aparece, se debe revisar `.gitignore` antes de continuar.

Para registrar modificaciones posteriores del README:

```powershell
git add README.md
git commit -m "Documentar instalación y configuración del proyecto"
```

## 10. Repositorio en GitHub

El proyecto se publicará en GitHub para mantener una copia remota del código fuente y facilitar el seguimiento de los cambios.

**Enlace del repositorio:** https://github.com/JeroHenaox/gestor-adso.git

Una vez configurado el repositorio remoto, se puede comprobar con:

```powershell
git remote -v
```

Si todavía no existe un remoto configurado, agregar la URL real del repositorio:

```powershell
git remote add origin URL_DEL_REPOSITORIO
```

Después, publicar la rama principal:

```powershell
git push -u origin main
```

Se debe reemplazar `URL_DEL_REPOSITORIO` por la dirección real del repositorio. Antes de publicar, verificar que `.env` no esté incluido en los archivos que se van a subir.

## 11. Estructura general del proyecto

```text
gestor-adso/
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── .env.example
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
└── README.md
```

## 12. Evidencias de la actividad

Las evidencias deben mostrar los resultados reales del proceso:

1. Verificación de PHP y sus extensiones.
2. Verificación de Composer, Git y Visual Studio Code.
3. Creación del proyecto Laravel.
4. Versión de Laravel y estructura del proyecto.
5. Aplicación funcionando en el navegador.
6. MySQL iniciado y base de datos creada, si ya se completó esta configuración.
7. Resultado de las migraciones.
8. Repositorio Git local y primer commit.
9. Repositorio publicado en GitHub, cuando se haya realizado el envío.

Las capturas deben guardarse de forma organizada. Si varias muestran exactamente la misma información, se puede utilizar una sola como evidencia principal.

## 13. Autor y actividad

* **Autor:** Jeronimo Henao Sanchez
* **Programa:** Análisis y Desarrollo de Software (ADSO)
* **Institución:** Servicio Nacional de Aprendizaje (SENA)
* **Actividad:** Semana 1 — Instalación y primer arranque
* **Proyecto:** Gestor ADSO

## 14. Estado del proyecto

Se creó la estructura base de Laravel, se verificaron las herramientas principales del entorno y se inicializó el repositorio Git local. También se registró el primer commit.

La conexión con MySQL, la ejecución de las migraciones y la publicación del repositorio remoto deben confirmarse con sus resultados reales antes de marcar esas tareas como terminadas.
