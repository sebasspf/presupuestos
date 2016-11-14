# Sistema de presupuesto Velpres
<img src="https://s17.postimg.org/ywxkxullb/nuevo_presupuesto.png" alt="Velpres captura">

Velpres es un simple pero versátil sistema pensado para la organizacion de profesionales / talleres que se dedican a reparar productos. Su funcionalidad estrella es permitir enviarle a los clientes su presupuesto (costo de la reparación / servicio) por correo electrónico, y darles la oportunidad de aceptarlo o rechazarlo mediante una interfaz web. Hecho en [Laravel PHP](https://laravel.com)(backend) y [Bootstrap](http://getbootstrap.com/) con [jQuery](https://jquery.com/) (Frontend).

## Requerimientos

- [Composer](https://getcomposer.org)
- [PHP](https://php.net) >= 5.6.4
- Extensiones PHP ([PDO](http://php.net/manual/en/book.pdo.php), [MYSQL](http://php.net/manual/es/book.mysql.php))
- Base de datos compatible (MySQL, MariaDB)

## Características

- Creación de presupuestos mediante interfaz web.
- Los presupuestos pueden englobar varios productos / servicios.
- Envío de presupuestos por correo electrónico a la dirección del cliente (es necesario tener el email del cliente).
- Interfaz web para que el cliente acceda al detalle de los presupuestos tanto ingresando una clave, como por enlace directo.
- Manejo de diferentes estados para los presupuestos.

## Tareas pendientes

El sistema está actualmente en estado alpha. Si bien es usable, algunas características son aún necesarias y se desarrollarán proximamente:

- Manejo de fechas más avanzado (ver cuantos días faltan para la fecha de entrega estimada al cliente, etc).
- Página principal del administrador con un resumen de la situación actual (presupuestos pendientes, cancelados, enviados, etc).
- Documentación: Manual de usuario detallando al 100% como funciona el sistema.
- Mayor cantidad de pruebas unitarias.
- Instrucciones detalladas y script de instalación.

## Licencia

Velpres es un sistema de código abierto licenciado bajo la [liciencia MIT](http://opensource.org/licenses/MIT). El sistema se proveé en su estado actual y su uso es bajo responsabilidad del usuario.
