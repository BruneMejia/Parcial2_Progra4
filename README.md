# Parcial2_Progra4
Integrantes
Freddy Samuel Vasquez Alvares
Madeline Brunella Mejia Mejia
Francisca Del Carmen Bonilla Argueta



Preguntas
¿Cómo manejan la conexión a la base de datos y qué pasa si algunos de los datos son incorrectos?

La conexión a la base de datos se maneja por medio de un archivo llamado `conexion.php`. En ese archivo se colocan los datos principales, como el servidor, el usuario, la contraseña y el nombre de la base de datos. Después se usa `mysqli` para realizar la conexión entre PHP y MySQL.
Para comprobar que la conexión funciona correctamente, se valida si existe algún error con `connect_error`. Si la conexión falla, el sistema muestra un mensaje de error y detiene la ejecución. Esto es importante porque evita que la aplicación siga funcionando de manera incorrecta o intente trabajar sin acceso a la base de datos.
Cuando algunos datos ingresados son incorrectos, el sistema los valida antes de guardarlos. Por ejemplo, se revisa que no haya campos vacíos, que la cantidad de boletos sea un número válido y mayor que cero, y que el usuario seleccione correctamente opciones como el tipo de sala y el formato de la película. De esta manera se evita 
almacenar información equivocada.


¿Cuál es la diferencia entre $_GET y $_POST en PHP? ¿Cuándo es más apropiado usar cada uno? Da un ejemplo real del proyecto.

La diferencia principal entre `$_GET` y `$_POST` es la forma en que envían la información.
`$_GET` manda los datos por la URL, por eso estos quedan visibles. Generalmente se utiliza cuando se necesita enviar información sencilla, como un identificador, una búsqueda o un filtro.
`$_POST`, en cambio, envía los datos de forma oculta dentro de la solicitud. Por eso es más recomendable cuando se trabaja con formularios o con información que no conviene mostrar directamente en la URL.
En este proyecto usamos `$_POST` en el login, porque ahí se envían el correo y la contraseña del usuario. También se usa `$_POST` cuando se registra o edita una reserva. Por otro lado, `$_GET` se utiliza cuando se envía el id de una reserva para poder editarla o eliminarla.


¿Qué riesgos de seguridad identifican en una app web con base de datos que maneja datos de usuarios? ¿Cómo los mitigarían?

Uno de los principales riesgos es que personas no autorizadas intenten entrar al sistema. Para reducir ese problema se implementó un login, validación de credenciales y manejo de sesiones, de manera que solo un usuario registrado pueda ingresar datos.
Otro riesgo importante es la inyección SQL, que ocurre cuando alguien intenta manipular los formularios para alterar las consultas a la base de datos. Esto se mitiga utilizando consultas preparadas, ya que ayudan a proteger mejor la información.
También existe el riesgo de guardar datos vacíos, incompletos o inválidos. Para evitarlo se aplican validaciones en los formularios y en el código PHP antes de registrar la información. Además, en un sistema real también sería importante proteger mejor las contraseñas usando cifrado, por ejemplo con `password_hash()`, ya que guardarlas en texto plano no es lo más seguro.


Diccionario de datos
Tabla: usuarios
Columna	Tipo de dato	Límite de caracteres	¿Es nulo?	Descripción
id	INT	11	No	Identificador único del usuario
nombre	VARCHAR	100	No	Nombre del usuario registrado
correo	VARCHAR	100	No	Correo utilizado para iniciar sesión
password	VARCHAR	100	No	Contraseña del usuario


Tabla: peliculas
Columna	Tipo de dato	Límite de caracteres	¿Es nulo?	Descripción
id	INT	11	No	Identificador único de la película
titulo	VARCHAR	100	No	Nombre de la película
genero	VARCHAR	50	No	Género de la película
clasificacion	VARCHAR	20	No	Clasificación por edad
fecha_estreno	DATE	-	Sí	Fecha en la que se estrena la película


Tabla: reservas
Columna	Tipo de dato	Límite de caracteres	¿Es nulo?	Descripción
id	INT	11	No	Identificador único de la reserva
nombre_cliente	VARCHAR	100	No	Nombre del cliente que realiza la reserva
cantidad_boletos	INT	11	No	Cantidad de boletos reservados
tipo_sala	VARCHAR	50	No	Tipo de sala seleccionada
formato	VARCHAR	20	No	Formato de la película (2D o 3D)
fecha_funcion	DATE	-	Sí	Fecha en la que se verá la película


