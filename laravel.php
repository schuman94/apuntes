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

Instalar la extension clockwork en google chrome
Y luego tambien lo instalamos para laravel siguiendo las instrucciones en: https://underground.works/clockwork/

Tambien es interesante instalar con el composer la barra de depuracion de laravel (laravel debug bar)

Instalar el flowbite en laravel: npm install -D flowbite

ctrl+p nos sirve para buscar ficheros en laravel

Las plantillas estan en resource/views
Una clase y una plantilla forman un componente
Si yo dentro de los layouts creo una subcarpeta para organizar los layout, hay que indicar en la clase del componente (app/View/Components) que la ruta es distinca: return view('layouts.guest.navigation')
(En verdad hay componentes que no tienen clase asociada, pero como minimo una plantilla tiene que tener)

convertir (castear) un array en un objeto de la clase standard class:  (object) $array

Articulo::all() devuelve un array de instancias de articulos (porque  tenemos una tabla articulo)

 para trabajar con sesiones podemos usar una funcion helper o el contenedor de inyeccion de dependencias:
 session('carrito')

 dd() es una combinacion de var_dump y die

 en las rutas se pueden poner un ->whereNumber('id') y asi le indicas que el segmento de la ruta del id tiene que ser un numero.

 tambien se le puede dar un name, y este ya lo puedes usar en los href en vez de poner la ruta, no vaya a ser que la ruta cambie.

 variables de sesion de tipo flash (que solo existen durante un turno, perfecta para alerts de error):
 session()->flash('error', 'blabla')

 redirect()->route('nombre')  sirve para hacer redireccion usando el nombre en vez de la uri.


 En app te puedes crear un fichero helpers.php para crear funciones. Y luego en el autoload puedes meter ese fichero para que asi las funciones siempre se reconozcan.
 Y si no funciona pon el comando composer dump autoload por si acaso lo arregla


Partimos de un clone:
gh repo clone blabla
nos metemos en el directorio
composer install (reconstruye la carpeta vendor)
npm install
copiar el .env.example  y crear un .env y meterle los datos sobre todo de la base de datos  (pgsql, puerto 5432, nombre de la base de datos, usuario y contraseña)
tambien hay que crear la base de datos:
sudo -u postgres create user -P NombreUsuario
sudo -u postgres createdb -O NombreUsuario NombreBBDD
php artisan db (para comprobar que nos podemos conectar a la bbdd)
php artisan migrate (se crean las migraciones)
php artisan serve (en una ventana aparte)
npm run dev (en una ventana aparte)
php artisan key:generate (esto es para que en el .env se rellene el APP_KEY)
le podemos meter datos de prueba desde la base de datos o desde la propia aplicacion web o el eloquent desde el tinker


Si lo que queremos es iniciar un proyecto nuevo:
composer create-project laravel/laravel
y hacemos tambien las cositas de antes.
