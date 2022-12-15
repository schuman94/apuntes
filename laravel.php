Apuntes Laravel

El front controller es el index.php que hay en public. Lo que hace es instanciar un kernel, el cual se encarga de manejar peticiones.
El metodo handle recibe la petición y recibe la respuesta.

Arrancamos el servidor: php artisan serve
Lo equivalente al watch, osea, para el tema del css y que haga una recarga automatica de la pagina: npm run dev
Conectarte a la base de datos: php artisan db
Mirar las tablas: \d
Mirar las rutas que hay en la aplicacion: php artisan route:list

routes/web.php aqui estan las rutas donde podemos añadir mas

En app/Http/Middleware estan los middleware

Un psyshell que ya tiene cargada las cosas del laravel: php artisan tinker

En el .env se guardan variables de entornos. Estan datos de configuracion como los campos de inicio de sesion de la base de datos, este archivo no se sube a github.

Para laravel un modelo es una clase que representa una tabla. Gracias a Eloquent.
Los modelos van dentro de app/Models

En laravel hay 3 capas para trabajar con la basededatos, la mas baja es DB:: la segunda es Query Builder, y la más alta es Eloquent (Un patron Active Record)

Cuando creas con el artisan un modelo, tambien puedes pedirle que te cree su correspondiente migracion de la tabla.

php artisan make:model -m Articulo (con el -m le indicamos que se  cree la migracion (no aplicarla eh, solo crear el archivo)
con la opcion -c tambien te crea el controlador ArticuloController
y con -r te crea un controlador de tipo recurso, es decir, con un esqueleto preparado para un CRUD)

Con esto se crea una migracion, es decir ya nos da una plantilla de la tabla articulos que obviamente le faltan ahora las columnas y las restricciones.
Ahora nosotros modificaremos el archivo de esa migración antes de aplicarla para que se cree en la base de datos.

Tambien se ha  creado el modelo Articulo en la carpeta Models, que es un esqueleto, puede que tengamos que tocarlo.

En las columnas de tipo varchar si no pones longitud, por defecto es 255.  Y se escribe: string.
Las columnas son NOT NULL por defecto, a menos que le pongas nullable.

El timestamps() te crea el createdat y el updatedat

php artisan migrate:status    nos dice las migraciones ejecutadas y las pendientes.

Aplicar las migraciones: php artisan migrate

Para insertar datos ahora puedes crear una instancia del objeto y añadirle valores a sus atributos.
Luego aplicas el metodo save() a ese objeto y se guarda como fila en la tabla de la base de datos.

El save() tambien sirve para hacer un update en la bbdd, modificas el atributo que quieras y haces el save().
