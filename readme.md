# Ejercicio FullStack
## _Tienda Rosatel_

Implementación de API que lista una serie de ordenes de compra para ser consumida por un frontend desacomplado 

- Realizada en PHP, sin frameworks (parte del requerimiento)
- Autenticación por medio de JWT ([php-jwt](https://github.com/firebase/php-jwt))
- Manejo de rutas con [Bramus/Router](https://github.com/bramus/router)
- Implementando estandar PSR-4

## Instalación

### Requisitos
Instalar [Composer](https://getcomposer.org/doc/00-intro.md)

Una vez descargado el proyecto ejecutar
```sh
composer install
```

### Servicio
Para levantar el servicio, ir a la carpeta ``./public`` y ejecutar:

```sh
php -S localhost:8000
```

Esto habilita el *API* en el puerto especificado

### Datos
Para cargar los datos se debe crear una Base de Datos en *Mysql* utilizando el archivo ``DB_data.sql`` adjunto en la raíz del proyecto

### Configuración

Todos los parámetros de conexión se establecen en el archivo ``.env`` en la raíz del proyecto. Tomar como ejemplo el archivo ``.env.example``

> Nota: Se requiere tener habilitador en PHP el modulo ``mod_rewrite`` 

## License

MIT