<!DOCTYPE html>
<html lang="en" class="dark">
<!-- <html
    lang="en"
    class="dark dark:bg-gray-950 scheme-light dark:scheme-dark"> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link rel="stylesheet" href="/public/css/style.css">

    <script
        src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1"
        type="module">
    </script>

    <!-- STANDARD JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@7.0.1/all/global.js"></script> -->

    <!-- THEME JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@7.0.1/themes/monarch/global.js"></script> -->

    <!-- STYLESHEETS -->
    <!-- <link href='https://cdn.jsdelivr.net/npm/fullcalendar@7.0.1/skeleton.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@7.0.1/themes/monarch/theme.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@7.0.1/themes/monarch/palettes/purple.css' rel='stylesheet' /> -->

    <!-- <link href='/public/css/calendar.css' rel='stylesheet' /> -->

    <link rel="stylesheet" href="/public/css/select2.min.css">
    <link rel="stylesheet" href="/public/css/select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet" href="/public/css/especificSelect2.css">
    <script src="/public/js/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="/public/css/bootstrap.min.css"> -->
    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/select2.min.js"></script>

</head>
<!-- continuar con el modo oscuro del calendario y trabajar con el calendario -->

<body class="bg-olive-100 text-black dark:bg-gray-900 dark:text-white transition-colors duration-300">
    <div class="w-full md:w-1/2 mx-auto px-4">
        <div class="grid grid-cols-1 gap-6 mb-3">
            <!-- Cambio de tema -->
            <button id="toggle-theme" class="px-2 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded transition-colors duration-300 mt-4 ml-4">
                🌙
            </button>
        </div>
    </div>

    <!-- <div id="renderPage"></div> -->
    <main>

        <?php require __DIR__ . '/information.php'; ?>

    </main>


</body>


</html>


<script>
    $(function() {
        // loadPage("/");
    });

    function loadPage(route) {
        let page = "";
        switch (route) {
            case "/":
                page = "/views/information.php";
                break;
            default:
                page = "/views/404.php";
        }

        $.get(page, function(response) {
            $("#renderPage").html(response);
        });

    }

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