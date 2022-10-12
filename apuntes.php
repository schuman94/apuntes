# Esto es un comentario de una linea

/* Esto
es un comentario
de varias lineas
*/

/**
* Comentario
* de documentacion
*/



$x = $x + 1  es lo mismo que $x += 1 y que $x++ (postincremento) y ++$x (preincremento)

Asignacion por referencia
=&
Por ejemplo:
$x = 4;
$y =& $x    En verdad lo que estoy haciendo es darle otro nombre extra a la misma variable,
            si modifico una de las dos, "la otra" tambien cambia) Osea que $x y $y en verdad son identificadores, no variables.
            La variable es a la que apuntan los dos identificadores.

Destruir una variable:
unset()     En realidad lo que borra es una ligadura, osea un identificador.
            Y si ya no hay ninguno que apunte a la variable, pues se destruirá.

En el sapi cli, el nombre del script ya es el primer argumento del $argc  (devuelve el numero de argumentos pasados al script)
$argv (es un array con todos los argumentos pasados al script)

CADENAS
"" interpreta cosas
'' es literal, no interpreta secuencias de escape ni nada.

heredoc: cadenas en varias lineas.
<<<EOT
ekjwedflknwñelsdcnaodsflk\njwñeadkfj
awefaesfweadsfesdfewsfde
EOT

nowdoc: igual pero no interpreta las secuencias de escape
<<<'EOT'
asdfbghf\nsz
safdvgafds
EOT

strelen() es una funcion que devuelve el tamaño de una cadena(los bytes).
Recordatorio: los caracteres especiales pueden ocupar 2 bytes.

trim()  elimina los espacios de una cadena por la derecha e izquierda.
Puedes añadir un segundo argumento con una cadena que incluye caracteres que considera descartables.
Por defecto es el espacio, tabulador, salto de linea, etc.

IMPORTANTE: INSTALAR LA EXTENSION
sudo apt install php8.1-mbstring

mb_strpos() te devuelve el numero de la posicion de la primera ocurrencia de una cadena. False si no la encuentra.

is_null() devuelve true o false si el valor el es null
isset() devuelve false si la variable que le pasas no existe o es null
empty() pregunta si es vacio (cadena vacia, un 0 o la cadena '0')

gettype() devuelve una cadena con el nombre del tipo del valor que le pasas como argumento.

is_numeric() devuelve true si es un int o un float o una cadena con forma de numero.

ctype_alnum, ctype_digit, ctype_lower etc  comprueban si una cadena contiene solo un tipo de caracter como alfanumericos, digitos, minusculas, etc.

operadores de casting: (string), (int), etc
la funcion intval() convierte en in el argumento que le pases, con la ventaja de que le puedes indicar la base.

Funciones interesantes:
number_format()

Operadores de comparacion
==  compara dos valores despues de la manipulacion de tipos. Ej: "1" == 1  devuelve true porque convierte la cadena "1" en int.
Nota: siempre que la comparacion implique numeros, las cadenas se convierten en numeros.

=== compara valores teniendo en cuenta tambien si son del mismo tipo. "1" === 1 devuelve false.

!= y !== son los opuestos.

El operador fusion de null:  ??
Por ejemplo, esta expresion: $a??$b??$c   devuelve el primero que no es nulo.

Los numeros que esten escritos en una cadena siempre se interpretan en decimal. Por ejemplo, el 012 es el doce en octal,
pero el "012" al pasarlo a numero se interpreta como 12.

operador ternario   condicion ? expr1 : expr2

operador elvis      expr1 ?: expr2
Ej "hola" ?: "pepe"   se evalua la expresion "hola" y da true, asi que devuelve "hola"
Ej: "0" ?: "pepe"     se evalua la expresion "0"  y da false, así que devuelve "pepe"

declarar una constante:  const PEPE = "hola"


sintaxis alternativa del if:
if (1 == 2):
    echo "Si";
else:
    echo: "No";
endif;

sintaxis alternativa del switch
switch (4):
    case 0:
        echo "Es 0";
        break;
    case 1:
        echo "Es 1";
endswitch;

sintaxis alternativa del while:
while ($x < 10):
    echo "Value" . $x;
    $x++;
endwhile;

Añadir elementos a un array:
$x = [1, "hola", 3];
$x[] = "pepe";   ahora el array es [1, "hola", 3, "pepe"]

eliminar un elemento de un array: unset($x[0]);

Crear un array asociativo:
['a' => 33, 'b' => 45, 3 => 'hola']

foreach ($array as $k => $v) {
    instrucciones;
}

sintaxis alternativa del foreach:
foreach ($array as $k => $v):
    instrucciones;
endforeach;


Expansion de variables:
dentro de una cadena con comillas dobles, php interpreta una variable porque lleva el dolar
"$xsldkkhs"
pero si existiese tambien una variable $xs, para decirle que lo que queremos es $x usamos las llaves. "{$x}sldk"
O tambien cuando la variable sea un elemento de array "{$x[24]}saefasdf"

La suma de arrays con el operador "+", solo añade del segundo array los valores de claves que no aparezcan en el primer array.

La funcion array_merge() actua dependiendo de si las claves son cadenas o numeros. Con numeros, si se repiten, no pasa nada, se añaden todos.
Pero si las claves son cadenas, se sobrescriben, de forma que se conservan las del ultimo array.


<?= ... ?>   nos permite ahorrarnos el <?php echo  ...; ?>

La funcion extract() tiene un array como argumento, y lo que hace es crear variables con los las claves-valor del array. Muy util.

La funcion compact('i', 'j', 'k') te crea un array con las variables que les metes, pero se las metes con comillas, sin el $, ya que
si no, esa variable se sustituye por su valor y no hay forma de acceder al nombre de la variable para usarlo como clave en el array.

array_combine($k, $v) combina dos arrays, haciendo el que el primer sean las claves y el segundo los valores.

array_unshift() añade un elemento al array poniendolo al principio y desplazando los demas.

array_rand() elige un valor aleatorio de dentro de un array.

array_key_exists() true si la clave está en el array (incluso aunque esa clave tenga valor null, cosa que no ocurre con isset)

array_map('nombreFuncion', $array1)   (podriamos meterle mas arrays si la funcion recibe mas de un argumento))

array_filter($array, 'nombreFuncion)
array_filter($array, function ($x) { return $x % 2 !=0; })   Tambien se pueden meter funciones anonimas (que son clausuras en php)

array_reduce($array, function ($x, $y) { return $x * $y; }, 1)   El 1 es si el array está vacio, devuelve ese valor.

array_diff() es una resta de conjuntos, compara dos arrays, pero compara los valores, no las parejas clave-valor.
array_diff_key() si compara las claves, no los valores.
array_diff_assoc() compara las parejas clave-valor.

array_diff_ukey() le pasas una funcion que es la que decide si dos elementos son iguales.

array_fill() sirve para crear un array rellenandolo con valores: array_fill(2, 2, 'a')

array_slice() corta una rodaja del array

array_flip() intercambia los valores por las claves

Para acceder a la constante o un metodo estatico de una clase se usa el operador de resolucion de ambito ::

$nueva = $fecha  cada identificador apunta a una variable, y ambas variables apuntan al mismo objeto.
Si modificamos el objeto, vemos el cambio desde ambas, porque son el mismo.

$nueva =& $fecha   ahora ambos identificadores apuntan a la misma variable, la cual por supuesto apunta hacia el mismo objeto.
Si modificas la variable, desde un identificador, tambien se ve el cambio desde el otro.

$nueva = clone $fecha   ahora son variables distintas y objetos distintos, es una copia.


Dos objetos son iguales si son instancia de la misma clase y tienen los mismos valores en sus propiedades (==)
Dos objetos son identicos si son el mismo objeto (===)


POSTGRESQL
sudo apt update
sudo apt install postgresql
sudo systemctl status postgresql.service
sudo -u postgres psql -l
sudo -u postgres createuser -P nombredelusuarioigualqueeldelabasededatos

sudo -u postgres createdb nombredelabasededatos
sudo -u postgres psql -l

psql -h localhost -d nombredelabasededatos -U nombredelusuarioigualqueeldelabasededatos

\d     lista las tablas

ctrl+d es para salir de la basededatos


INYECTAMOS UN SCRIPT DE SQL PARA QUE CREE LA TABLA
psql -h localhost -d empresa -U empresa < empresa.sql



dar permisos de ejecucion a un scriptt
chmod a+x crear.sh



paquetes para postgres:
sudo apt install php8.1-pgsql

Otros de php:
sudo apt install php8.1-intl php8.1-xml php8.1-zip



o mejor nos desentendemos y cogemos todos los indicados en la moodle:
sudo apt install php8.1 php8.1-amqp php8.1-cgi php8.1-cli php8.1-common php8.1-curl php8.1-fpm php8.1-gd php8.1-igbinary php8.1-intl php8.1-mbstring php8.1-opcache php8.1-pgsql php8.1-readline php8.1-redis php8.1-sqlite3 php8.1-xml php8.1-zip

Para eliminar de linux paquetes que no sirvan:
sudo apt --purge autoremove
