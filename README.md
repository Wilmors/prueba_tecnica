Prueba desarrolladores FullStack PHP-VUE

Versión de php en el que se realizó 7.4.33
Base de datos Mysql

Funcionamiento:
Al cargar la página, se observará un botón en el centro. Al hacer clic en él, seremos redirigidos a una nueva página donde encontraremos tres botones: "Crear", "Copiar" y "Consultar".
Al hacer clic en el botón "Crear", seremos llevados a la página "Crear proceso/Evento participación cerrada". En esta página encontraremos un formulario dividido en 2 segmentos: "Información básica" y "Cronograma".
El formulario "Información básica" consta de los siguientes campos:
Objeto: es un campo de entrada que nos permite ingresar un texto alfanumérico para identificar un nuevo proceso.
Descripción/Alcance: es un campo de entrada que nos permite proporcionar una descripción más detallada del proceso.
Moneda: es un menú desplegable donde se pueden seleccionar tres tipos de moneda (COP, USD, EUR).
Presupuesto: es un campo de entrada donde podemos ingresar el presupuesto del proceso.
Actividad: se divide en dos partes. La primera parte es un campo de entrada donde no se pueden ingresar datos directamente. La segunda parte es un botón llamado "Clases" que abrirá un modal donde se encontrarán diferentes filtros (segmento, familia, clase, producto). Estos filtros se desplegarán uno tras otro, y al finalizar con el filtro "producto", al hacer clic en el botón "Guardar", el campo de entrada "Actividad" se autocompletará.
El segmento "Cronograma" del formulario consta de los siguientes campos:
Fecha de inicio: se ingresa la fecha de inicio del evento.
Hora de inicio: se ingresa la hora de inicio del evento.
Fecha de cierre: se ingresa la fecha de cierre del evento.
Hora de cierre: se ingresa la hora de cierre del evento.
Una vez que hayamos completado los formularios, al hacer clic en el botón "Guardar", se habilitará un nuevo segmento llamado "Documentación petición de ofertas", y al mismo tiempo se desactivarán todos los campos de entrada creados en los formularios anteriores. En este formulario, podremos agregar adjuntos con un título y una descripción. Estos adjuntos estarán relacionados con el proceso creado anteriormente.
Finalizaremos el proceso revisando los datos ingresados en la tabla superior. Una vez completado este paso, daremos clic en la flecha que se encuentra en la parte superior izquierda para acceder al menú de los tres botones.
Al hacer clic en el botón "Consultar", seremos redirigidos a la página "Proceso/Eventos participación cerrada". En esta página encontraremos un formulario con cuatro campos de entrada, tres botones y una tabla.
Los campos de entrada nos servirán como filtros. Al hacer clic en el botón "Buscar", la tabla inferior se actualizará según los filtros que hayamos completado. Luego, podremos hacer clic en el botón "Descargar Excel" para generar un archivo Excel con los datos filtrados y descargarlo en nuestro navegador.
Por último, tenemos el botón "Publicar", el cual nos llevará a una nueva pestaña donde podremos ver una tabla con todos los datos creados anteriormente. En esta tabla, observaremos una columna llamada "Estado". Al crear un nuevo proceso, este se establecerá con el estado "Activo". En la tabla, veremos un botón llamado "Publicar" y al hacer clic en él, cambiaremos el estado a "Publicado". En la parte superior, también veremos un botón llamado "Tarea Cron", el cual ejecutará un script para comparar la hora actual con la fecha de inicio. Si coinciden, el estado del proceso cambiará a "Evaluación".

Proceso para compilar:
1.Descargamos e instalamos XAMPP.
2.Instalamos Git.
3,Iniciamos XAMPP y seleccionamos "Start" en Apache y MySQL.
4.Navegamos hasta la ubicación donde instalamos XAMPP y creamos una carpeta en la carpeta "htdocs" con el nombre que deseemos darle al proyecto.
5.Accedemos a la carpeta recién creada y hacemos clic derecho, luego seleccionamos "Git Bash Here".
6.Copiamos el enlace que se muestra en el botón verde que dice "Code". Dentro de la ventana que se abrió en el paso anterior, escribimos "git clone" y pegamos el enlace.
7.Abrimos el navegador y escribimos "localhost/" seguido del nombre de la carpeta donde descargamos el repositorio.
8.Por último, en el navegador escribimos localhost/phpmyadmin y aquí vamos a importar e importamos el archivo que está en el respositorio dentro de Bd.

Base de datos:
Tomaremos en cuenta la base de datos y la creación de las tablas, ya que al momento de crear la tabla "clase", se observa que teniene una cantidad de datos muy alta y esto puede hacer que el programa no compile al realizar una inserción normal,en su lugar, se utilizó la opción de importar un archivo Excel directamente.
Se creó una base de datos llamada "prueba_suplos" que contiene tres tablas: "clase", "files_info" e "info_basica".
En la tabla "clase" se encuentra la tabla maestra.
La tabla "files_info" se utiliza para almacenar los datos del formulario "Documentación petición de ofertas".
En la tabla "info_basica" se guardan los datos de los formularios "Información básica" y "Cronograma".

Descarga de Excel:
Se utilizó la librería PhpSpreadsheet para generar el archivo Excel descargable.
Fue necesario descargar Composer para asegurar el correcto funcionamiento de la librería.
