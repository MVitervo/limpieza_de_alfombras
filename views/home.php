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

    <script src="/views/modal_error.js"></script>
    <script src="/views/modal_success.js"></script>

</head>

<body class="bg-olive-100 text-black dark:bg-gray-900 dark:text-white transition-colors duration-300">

    <!-- <div id="renderPage"></div> -->
    <main>

        <?php require __DIR__ . '/information.php'; ?>


    </main>

    <a href="/login"
        class="
        fixed bottom-4 left-4
        flex items-center gap-2
        bg-blue-500 hover:bg-blue-700
        text-white font-bold
        py-2 px-4
        rounded-full
        shadow-md
        transition-colors duration-200
   ">

        <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="size-6">

            <path fill-rule="evenodd"
                d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                clip-rule="evenodd" />

        </svg>

        <!-- <span>Ir al login</span> -->

    </a>


</body>


</html>


<script>
    /*
    $(function() {
        // loadPage("/");
    });

    function loadPage(route) {
        let page = "";
        switch (route) {
            case "/":
                page = "/views/information.php";
                break;
            case "/login":
                page = "/views/login.php";
                break;
            default:
                page = "/views/404.php";
        }

        $.get(page, function(response) {
            $("#renderPage").html(response);
        });

    }
    */

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