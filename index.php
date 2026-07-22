<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link rel="stylesheet" href="/public/css/style.css">

</head>

<body class="bg-olive-100 text-black dark:bg-gray-900 dark:text-white transition-colors duration-300">

    
    <!-- Cambio de tema -->
    <button id="toggle-theme" class="px-2 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded transition-colors duration-300 mt-4 ml-4">
        🌙
    </button>
    <form class="px-4">
        <div class="w-full md:w-1/2 mx-auto">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading text-gray-700 dark:text-gray-200">First name</label>
                    <input
                        class="
                        w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500

                        bg-white
                        text-black
                        border-gray-300

                        dark:bg-gray-800
                        dark:text-white
                        dark:border-gray-600
                        dark:placeholder-gray-400
                    " placeholder="John" type="text" id="first_name" required/>
                </div>

                <div>
                    <label for="last_name" class="block mb-2.5 text-sm font-medium text-heading text-gray-700 dark:text-gray-200">Last name</label>
                    <input
                        class="
                        w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500


                        bg-white
                        text-black
                        border-gray-300

                        dark:bg-gray-800
                        dark:text-white
                        dark:border-gray-600
                        dark:placeholder-gray-400
                    " placeholder="John" type="text" id="last_name" required/>
                </div>
            </div>

            <div>
                <label for="last_name" class="block mb-2.5 text-sm font-medium text-heading">Last name</label>
                <input type="text" id="last_name" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        
                        bg-white
                        text-black
                        border-gray-300

                        dark:bg-gray-800
                        dark:text-white
                        dark:border-gray-600
                        dark:placeholder-gray-400" placeholder="John" required />
            </div>
        </div>
    </form>

</body>

</html>

<script>
    const themeButton = document.getElementById('toggle-theme');
    const html = document.documentElement;

    // Aplicar tema guardado al cargar
    if (localStorage.theme === 'dark') {
        html.classList.add('dark');
    }

    themeButton.addEventListener('click', () => {
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
</script>