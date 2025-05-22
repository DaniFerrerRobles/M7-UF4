<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).







Buenas! Soy Dani Ferrer, estudiante de DAW en FP LLEFIA, he hecho el intento de crear una api con Laravel 11 en la que permito registrar usuarios gracias a post con postman, también he hecho el login con token y logout de los usuarios. También he hecho los Middleware, que sirve para proteger al administrador y al usuario (para que nadie que no esté autorizado pueda hacer cosas raras jeje). También hemos hecho migraciones a la base de datos, las migraciones sirven para actualizar la base de datos desde Laravel11 (Codespace). A continuación explicaré como va el tema de los endpoints lo mejor posible :)  :
Lo que yo he conseguido ha sido:

-ENDPOINT PARA REGISTRAR USUARIOS (url del servidor + /api/register) pero... IMPORTANTE!en el Postman hemos de decirle que el metodo sea POST-BODY-RAW-JSON.... y montar la estructura json para registrar un usuario!

-ENDPOINT PARA logear USUARIOS (url del servidor + /api/login) pero... IMPORTANTE!en el Postman hemos de decirle que el metodo sea POST-BODY-RAW-JSON.... y montar la estructura json para logear un usuario!

-ENDPOINT PARA logout USUARIOS (url del servidor + /api/logout) pero... IMPORTANTE!en el Postman hemos de decirle que el metodo sea POST.... y cerraremos la sesión del actual usuario!

-ENDPOINT PARA VER TODOS LOS USUARIOS (url del servidor + /api/users) pero... IMPORTANTE!en el Postman hemos de decirle que el metodo sea GET.... y veremos todos los usuarios que hay!

-ENDPOINT PARA VER SOLO UN USUARIO (url del servidor + /api/users/id) pero... IMPORTANTE!en el Postman hemos de decirle que el metodo sea GET.... y veremos todos el usuario con el id que hemos puesto!

-ENDPOINT PARA ELIMINAR UN USUARIO (url del servidor + /api/users/id) pero... IMPORTANTE!en el Postman hemos de decirle que el metodo sea DELETE.... y eliminaremos al usuario!

Eso si... gracias a los Middlewere podemos controlar quien puede hacer segun que cosas, por ejemplo , si un usuario se logea correctamente si es admin podrá ejecutar unos endpoints y si es user otros.

Los controladores el "corazón" del programa y... por que? Facil! Los controladores son los encargados de que funcionen los endpoints (junto con las rutas), ya que ahí estará la lógica de programación.

Pero...que es JWT?
Muy facil! Esto son los tokens... un token no es más que una clave codificada que valida quien es el usuario y lo que puede hacer.

Administrador: {
  "email": "a@gmail.com",
  "password": "12345678"
}





