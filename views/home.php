<!DOCTYPE html>
<html lang="en" class="dark">

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
    <link rel="stylesheet" href="/public/css/dataTables.dataTables.min.css">
    <script src="/public/js/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="/public/css/bootstrap.min.css"> -->
    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/select2.min.js"></script>

    <script src="/public/js/dataTables.min.js"></script>
    <script src="/public/js/flatpickr.min.js"></script>

    <script src="/views/modal_error.js"></script>
    <script src="/views/modal_success.js"></script>

</head>

<body class="bg-olive-100 text-black dark:bg-gray-900 dark:text-white transition-colors duration-300">

    <div id="contentButtonTheme" class="w-full md:w-1/2 mx-auto px-4">
        <div class="relative w-full mx-auto px-4 gap-4">
            <!-- Cambio de tema -->
            <button id="toggle-theme" class="w-full md:w-3/5 mx-auto px-2 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded transition-colors duration-300 mt-4 ml-4">
                🌙
            </button>
        </div>
    </div>

    <main>
        <div id="renderPage"></div>
    </main>

    <div class="modalError">
    </div>

    <div class="modalSuccess">
    </div>

</body>


</html>


<script>
    // Variables globales || BEGIN
    window.id = 0;
    // Variables globales || END
    $(function() {
        loadPage(location.pathname);
    });

    /* 

    const EVENT_PUSH = 'pushstate';
    const EVENT_POP = 'popstate';
    
    function loadPage(route) {
        let page = "";
        switch (route) {
            case "/":
                page = "/views/information.php";
                break;
            case "/login":
                page = "/views/login.php";
                break;
            case "/list_register":
                page = "/views/list_register.php";
                break;
            case "/edit_register":
                page = "/views/edit_register.php";
                break;
            case "/add_register":
                page = "/views/add_register.php";
                break;
            case "/modify_dates_schedules":
                page = "/views/modify_dates_schedules.php";
                break;
            default:
                page = "/views/404.php";
        }

        $.get(page, function(response) {
            $("#renderPage").html(response);

        });


        window.history.pushState({}, '', route);
        const navigationEvent = new Event(EVENT_PUSH);
        window.dispatchEvent(navigationEvent);

    }

    */
    const NAVIGATION_EVENT = 'navigation';

    let currentPath = window.location.pathname;

    function loadPage(route) {

        history.pushState({}, '', route);

        window.dispatchEvent(
            new Event(NAVIGATION_EVENT)
        );
    }

    function onLocationChange() {

        currentPath = window.location.pathname;

        renderPage(currentPath);
    }

    function renderPage(route) {

        let page = "";

        switch (route) {
            case "/":
                page = "/views/information.php";
                break;

            case "/login":
                page = "/views/login.php";
                break;

            case "/list_register":
                page = "/views/list_register.php";
                break;

            case "/edit_register":
                page = "/views/edit_register.php";
                break;

            case "/add_register":
                page = "/views/add_register.php";
                break;

            case "/modify_dates_schedules":
                page = "/views/modify_dates_schedules.php";
                break;

            default:
                page = "/views/404.php";
        }

        $.get(page, function(response) {
            $("#renderPage").html(response);
        });
    }

    window.addEventListener(NAVIGATION_EVENT, onLocationChange);

    window.addEventListener('popstate', onLocationChange);

    document.addEventListener('DOMContentLoaded', () => {
        onLocationChange();
    });


    document.querySelector('.btnBack').addEventListener('click', function() {
        history.back();
    });

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