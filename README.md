# blog
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/IsaliaPHP/blog/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/IsaliaPHP/blog/?branch=main) [![Build Status](https://scrutinizer-ci.com/g/IsaliaPHP/blog/badges/build.png?b=main)](https://scrutinizer-ci.com/g/IsaliaPHP/blog/build-status/main)

Proyecto de ejemplo para un blog sencillo con IsaliaPHP

## Configuración de la base de datos
Es posible encontrar un respaldo de la base de datos de ejemplo en la carpeta App/Libs con el nombre de blog.sql
Es ideal crear una base de datos con MySQL / MariaDB llamada blog y luego importar el sql mencionado anteriormente en ella.


### Configurar acceso a la base de datos
Para configurar el acceso a la base de datos es necesario hacerlo en la clase Config.php que está alojada en App/Libs. En ella configuraremos el DSN, Usuario y Clave respectivo para la base de datos que tengamos creada.

```php
<?php

/**
 * Clase de configuraciones
 */
class Config {
    /**
     * utiliza de forma predeterminada MySQL (o MariaDB)
     */
    const CONNECTION_STRING = 'mysql:host=127.0.0.1;dbname=NombreBaseDatos;charset=utf8';
    const USER = 'usuarioBaseDatos';
    const PASSWORD = 'claveDelUsuario';
    const PARAMETERS = [
        PDO::ATTR_PERSISTENT => true, //conexión persistente
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
...
```
Como se ve en el trozo de código de la clase, usted, como usuario deberá modificar NombreBaseDatos en la constante de clase CONNECTION_STRING; el usuario en la constante USER y la clave de acceso en la constante PASSWORD.

### Usuario inicial
Una vez cargado el respaldo, podrá accederse usando la url blog/admin, que hará una redirección al controlador Login en el cual deberá ingresar como usuario: admin y clave: admin


Mucha suerte y buen viaje con la revisión de código y con las ideas que se le puedan venir en mente.
