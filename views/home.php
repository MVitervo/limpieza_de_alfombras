<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antonio Concartas | Agenda tu lectura de Tarot</title>


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
    <link rel="stylesheet" href="/public/css/flatpickr.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/home.css">
    <script src="/public/js/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="/public/css/bootstrap.min.css"> -->
    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/select2.min.js"></script>

    <script src="/public/js/dataTables.min.js"></script>
    <script src="/public/js/flatpickr.min.js"></script>

    <script src="/views/modal_error.js"></script>
    <script src="/views/modal_success.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body class="min-h-screen bg-ink text-parchment transition-colors duration-300">
    <main class="cosmos relative isolate min-h-screen overflow-hidden">
        <div class="starfield absolute inset-0 -z-0"></div>

        <nav class="relative z-10 mx-auto flex w-full max-w-[1500px] items-center justify-between gap-4 px-4 py-5 sm:px-8 lg:px-12">
            <div class="flex items-center gap-3">
                <div class="theme-toggle flex items-center rounded-full border border-gold/80 bg-black/30 p-1 backdrop-blur">
                    <button id="lightMode" type="button" aria-label="Activar modo claro" aria-pressed="false" class="toggle-active flex h-9 w-10 items-center justify-center rounded-full transition">
                        <i data-lucide="sun" class="h-4 w-4"></i>
                    </button>
                    <button id="darkMode" type="button" aria-label="Activar modo oscuro" aria-pressed="true" class="flex h-9 w-10 items-center justify-center rounded-full text-parchment transition">
                        <i data-lucide="moon" class="h-4 w-4"></i>
                    </button>
                </div>
            </div>
        </nav>


        <!-- <div id="contentButtonTheme" class="w-full md:w-1/2 mx-auto px-4"> -->
        <!-- <div class="w-full">
            <div id="contentButtonTheme" class="flex">
                <button class="btnBack mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6">
                        <path fill-rule="evenodd"
                            d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="btnToggleTheme w-full justify-center">
                    <button id="toggle-theme" class="w-full md:w-3/5 mx-auto px-2 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded transition-colors duration-300 mt-4 ml-4">
                        🌙
                    </button>
                </div>
            </div>
        </div> -->

        <div id="renderPage">

        </div>
        <footer class="relative z-10 px-5 pb-7 text-center font-display text-[9px] tracking-[.3em] text-parchment/60">
            ANTONIO CONCARTAS · TAROT EVOLUTIVO
        </footer>

    </main>



    <!-- <main>
        <div id="renderPage">

        </div>
    </main> -->

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
        onLocationChange();
        // window.dispatchEvent(
        //     new Event(NAVIGATION_EVENT)
        // );
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

    const previousRoutes = {
        '/': '/',
        '/login': '/',
        '/list_register': '/login',
        '/add_register': '/list_register',
        '/edit_register': '/list_register',
        '/modify_dates_schedules': '/list_register'
    };

    function goBack() {
        const currentRoute = window.location.pathname;
        const previousRoute = previousRoutes[currentRoute] ?? '/';

        loadPage(previousRoute);
    }

    if (document.querySelector('.btnBack')) {
        document.querySelector('.btnBack').addEventListener('click', function() {
            goBack();
        });
    }

    /*
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
    */
    lucide.createIcons();

    const root = document.documentElement;

    const lightMode = document.getElementById('lightMode');
    const darkMode = document.getElementById('darkMode');

    // Aplicar el tema y actualizar los botones
    function setTheme(theme) {
        const isDark = theme === 'dark';

        root.classList.toggle('dark', isDark);

        lightMode.classList.toggle('toggle-active', !isDark);
        darkMode.classList.toggle('toggle-active', isDark);

        lightMode.setAttribute('aria-pressed', String(!isDark));
        darkMode.setAttribute('aria-pressed', String(isDark));

        localStorage.setItem('theme', theme);
    }

    // Recuperar la preferencia guardada
    const savedTheme = localStorage.getItem('theme') || 'dark';

    setTheme(savedTheme);

    // Eventos de los botones
    lightMode.addEventListener('click', () => {
        setTheme('light');
    });

    darkMode.addEventListener('click', () => {
        setTheme('dark');
    });

    // Demostración visual. Reemplazar por el envío AJAX/PHP real.
    document.getElementById('appointmentForm').addEventListener('submit', event => {
        event.preventDefault();

        const form = event.currentTarget;
        if (!form.reportValidity()) return;

        const data = Object.fromEntries(new FormData(form).entries());
        console.log('Datos de la cita:', data);

        const message = document.getElementById('formMessage');
        message.textContent = 'Formulario validado. Conecta este evento con tu backend para guardar la cita.';
        message.classList.remove('hidden');
        message.classList.add('text-emerald-700', 'dark:text-emerald-300');
    });
</script>