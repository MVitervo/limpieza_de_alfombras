Comienzo del proyecto

se ejecutaron estos comandos

npm -v este solo sirve para verificar si ya se instalo node
npm init -y
npm install -D tailwindcss @tailwindcss/cli postcss autoprefixer

crear este carpeta y archivo dentro: src/input.css
poner este contenido: 
    @source "../**/*.{php,html,js}";
    @import "tailwindcss";

poner esto dentro de package.json:
"scripts": {
    "build-css": "tailwindcss -i ./src/input.css -o ./public/css/style.css --minify",
    "watch-css": "tailwindcss -i ./src/input.css -o ./public/css/style.css --watch"
}

npm run build-css

Comando para estar escuchando los cambios de tailwind
npm run watch-css

instalar jquery
npm install jquery@3.7.1

Luego instalar esto (crear la carpeta dentro de public para que funcione el comando):
copy node_modules\jquery\dist\jquery.min.js public\js\

instalacion de fullcalendar
npm install fullcalendar

instalacion de bootstrap:
npm install bootstrap

instalacion de select2:
npm install select2

instalacion de los estilos para el select2:
npm install select2-bootstrap-5-theme

continuar con el color del select2 en el modo oscuro

/*

Base de datos

CREATE TABLE appointment (
	Id INT IDENTITY,
	[Name] VARCHAR (100),
	[Lastname] VARCHAR(100),
	[Email] VARCHAR(200),
	[Phone] VARCHAR(20),
	Appointment VARCHAR(100),
	LastEditDt DATETIME

)


CREATE TABLE schedules (
	Id INT IDENTITY,
	Schedule VARCHAR(100),
	LastEditBy VARCHAR(100),
	LastEditDt DATETIME
)

INSERT INTO schedules (Schedule) 
VALUES ('8:00 AM - 10:00 AM'), ('10:00 AM - 12:00 PM'), ('12:00 PM - 2:00 PM'), ('2:00 PM - 4:00 PM'),
('4:00 PM - 6:00 PM'), ('6:00 PM - 8:00 PM')


la idea es que cuando la persona escoja un dia ire a revisar la tabla de appointment para saber
que horarios deshabilitar que seran los que ya exista un registro para ese dia esos se mostraran pero
deshabilitados

nota: algo que tengo pensado para deshabilitar el dia es que por cada dis haya cierto numeros de citas y una vez alcado
ese numero entonces ya podre deshabilitar ese dia

*/


Base de un ajax:

$.ajax({
	method: 'GET',
	url: '',
	dataType: 'json',
	success: function(response) {

	},
	error: function(response) {

	}
});