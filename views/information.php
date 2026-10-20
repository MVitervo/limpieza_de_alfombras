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

    <form class="px-4" id="appointmentForm">
        <!-- <div class="w-full md:w-1/2 mx-auto"> -->
        <?php require __DIR__ . '/form.php' ?>
        <!-- <div class="grid grid-cols-1 gap-6 relative">
            <div id="calendar"></div>
        </div> -->

        <!-- <button type="submit"
            class="w-full py-2 px-4
        bg-white-500/10 text-black
        dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
        ">
            Guardar
        </button> -->

        <!-- <div class="bg-sky-500/10"></div> -->

        <!-- </div> -->
    </form>

</div>




<a href="/login"
    data-route
    class="
        fixed bottom-4 left-4
        flex items-center gap-2
        bg-blue-500 hover:bg-blue-700
        text-white font-bold
        py-2 px-4
        rounded-full
        shadow-md
        transition-colors duration-200">

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
    </svg>

</a>

<!-- <button class="dialogErrorDatabaseButton" command="show-modal" commandfor="dialogErrorDatabase"></button> -->

<script>
    $("#renderPage").on("click", "a[data-route]", function(event) {

        // Si el usuario quiere abrir en otra pestaña,
        // dejamos que el navegador haga su comportamiento normal.
        if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) {
            return;
        }

        event.preventDefault();

        const route = $(this).attr("href");

        loadPage(route);
    });

    // document.querySelector('.btnBack').style.display = 'none';

    $(function() {
        // findAppointments();
        /*
        $('.expectHour').select2({
            theme: 'bootstrap-5',
            placeholder: 'first select a date',
            width: '100%'
        });
        */
        // document.querySelector('#contentButtonTheme').style.display = 'block';
    });

    function findAppointments() {
        $.ajax({
            method: 'GET',
            url: '',
            dataType: 'json',
            success: function(response) {

            },
            error: function(response) {

            }
        });
    }

    var form = document.querySelector('#appointmentForm');

    form.addEventListener('submit', function(event) {

        event.preventDefault(); // evita que la pagina recargue

        const appointment = $('#appointmentForm').serialize(); // toma todos los valores de los campos

        debugger;

        // retroalimentacion ya busque y me quedare siemopre con esta forma de manera estandar si por alguna razon los nombres de los campos del formulario
        // con diferentes a los del modelo entonces los voy a mappear directamente en el contrador

        $.ajax({
            method: 'POST',
            url: '/api/saveAppointment',
            data: appointment,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    modalSuccess(response.message);
                } else {
                    modalError(
                        response.message
                    );
                }
            },
            error: function(response) {
                modalError(response);
            }
        });

    });
</script>