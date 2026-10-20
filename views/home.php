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
    <link rel="stylesheet" href="/public/css/flatpickr.min.css">
    <link rel="stylesheet" href="/public/css/home.css">
    <script src="/public/js/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="/public/css/bootstrap.min.css"> -->
    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/select2.min.js"></script>

    <script src="/public/js/dataTables.min.js"></script>
    <script src="/public/js/flatpickr.min.js"></script>

    <script src="/views/modal_error.js"></script>
    <script src="/views/modal_success.js"></script>

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

        <div id="inicio" class="relative z-10 mx-auto grid min-h-[calc(100vh-80px)] w-full max-w-[1500px] grid-cols-1 items-center gap-10 px-5 pb-12 pt-5 sm:px-8 lg:grid-cols-[1.05fr_.95fr] lg:gap-12 lg:px-12 lg:py-10">
            <!-- Columna de marca / presentación -->
            <section id="marca" class="flex flex-col items-center text-center lg:items-start lg:text-left">
                <img src="logo-antonio-concartas.png" alt="Antonio Concartas — Tarot evolutivo" class="brand-logo mb-7 drop-shadow-[0_0_22px_rgba(198,154,91,.12)]">

                <p class="mb-3 font-display text-[10px] tracking-[.42em] text-gold sm:text-xs">DESCUBRE · ENTIENDE · EVOLUCIONA</p>
                <h1 class="max-w-xl font-display text-3xl leading-tight text-parchment sm:text-4xl md:text-5xl xl:text-6xl">
                    Agenda tu<br class="hidden lg:block"> lectura de Tarot
                </h1>
                <p class="mt-5 max-w-lg text-sm leading-7 text-stone-300 sm:text-base">
                    Un espacio para escucharte, encontrar nuevas perspectivas y conectar con tu propio camino.
                </p>

                <div class="mt-7 flex w-full max-w-xs items-center gap-4 text-gold">
                    <div class="ornament flex-1"></div>
                    <span>✦</span>
                    <div class="ornament flex-1"></div>
                </div>

                <div class="mt-7 hidden items-center gap-3 font-display text-[10px] tracking-[.3em] text-parchment/70 sm:flex">
                    <span>CONEXIÓN</span><span class="text-gold">✧</span>
                    <span>GUÍANZA</span><span class="text-gold">✧</span>
                    <span>EVOLUCIÓN</span>
                </div>
            </section>
        </div>
        <!-- <div id="contentButtonTheme" class="w-full md:w-1/2 mx-auto px-4"> -->
        <div class="w-full">
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
                <!--
                <div class="btnBackContainer">
                </div>
                -->
                <!-- <div class="relative w-full mx-auto px-4 gap-4"> -->
                <div class="btnToggleTheme w-full justify-center">
                    <button id="toggle-theme" class="w-full md:w-3/5 mx-auto px-2 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded transition-colors duration-300 mt-4 ml-4">
                        🌙
                    </button>
                </div>
            </div>
        </div>

        <div id="renderPage">

        </div>

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

    document.querySelector('.btnBack').addEventListener('click', function() {
        goBack();
    });

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
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                fontFamily: {
                    display: ['Cinzel', 'serif'],
                    sans: ['Inter', 'sans-serif']
                },
                colors: {
                    ink: '#100d14',
                    violet: '#2c2035',
                    gold: '#c69a5b',
                    parchment: '#f7efe3',
                    plum: '#49304f'
                },
                boxShadow: {
                    'gold': '0 0 0 1px rgba(198,154,91,.7), 0 18px 55px rgba(0,0,0,.32)'
                }
            }
        }
    }
</script>