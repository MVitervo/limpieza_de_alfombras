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
npm install jquery

Luego instalar esto (crear la carpeta dentro de public para que funcione el comando):
copy node_modules\jquery\dist\jquery.min.js public\js\