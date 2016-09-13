# Sistema de presupuesto Velpres
<img src="https://s17.postimg.org/ywxkxullb/nuevo_presupuesto.png" alt="Velpres captura">

Velpres es un simple pero versátil sistema para brindar presupuestos por email a clientes de talleres, centros de reparación, y de soporte de cualquier tipo. Con solo saber el email, es posible enviarle un presupuesto detallado al cliente por producto / servicio el cuál el podrá aceptar o rechazar por email. Hecho en [Laravel PHP](https://laravel.com)(backend) y [Bootstrap](http://getbootstrap.com/) con [jQuery](https://jquery.com/) (Frontend).

## Requerimientos

- [Composer](https://getcomposer.org)
- [PHP](https://php.net) >= 5.6.4
- Extensiones PHP ([PDO](http://php.net/manual/en/book.pdo.php), [MYSQL](http://php.net/manual/es/book.mysql.php))
- Base de datos compatible (MySQL, MariaDB)

## Características

- Creación de presupuestos mediante interfaz web. Solo necesita el email del cliente.
- Los presupuestos pueden englobar varios productos / servicios.
- Envío de presupuestos por correo electrónico a la dirección del cliente.
- Interfaz web para que el cliente acceda al detalle de los presupuestos tanto ingresando una clave, como por enlace directo.
- Manejo de diferentes estados para los presupuestos.
- Plantillas de Email personalizables.

## Tareas pendientes

El sistema está actualmente en estado alpha. Si bien es usable, algunas características son aún necesarias y se desarrollarán proximamente:

- Migración a Laravel 5.3 (actualmente 5.2).
- Mayor cantidad de pruebas unitarias.
- Instrucciones detalladas y script de instalación.
- Documentación
- Manejo de fechas más avanzado.
- Página principal del administrador con un resumen de la situación actual (presupuestos pendientes, cancelados, enviados, etc).

## Licencia

Velpres es un sistema de código abierto licenciado bajo la [liciencia MIT](http://opensource.org/licenses/MIT). El sistema se proveé en su estado actual y su uso es bajo responsabilidad del usuario.