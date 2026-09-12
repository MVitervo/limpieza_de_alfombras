
<form class="px-4" id="appointmentForm">
    <div class="w-full md:w-1/2 mx-auto">
        <?php require __DIR__ . '/form.php'?>
        <!-- <div class="grid grid-cols-1 gap-6 relative">
            <div id="calendar"></div>
        </div> -->

        <button type="submit"
            class="w-full py-2 px-4
        bg-white-500/10 text-black
        dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
        ">
            Guardar
        </button>

        <!-- <div class="bg-sky-500/10"></div> -->

    </div>
</form>


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

    <svg xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="size-6">

        <path fill-rule="evenodd"
            d="M7.5 6a4.5 4.5 0 1 1 9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437-.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
            clip-rule="evenodd" />

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

    $(function() {
        // findAppointments();
        $('.expectHour').select2({
            theme: 'bootstrap-5',
            placeholder: 'first select a date',
            width: '100%'
        });
        document.querySelector('#contentButtonTheme').style.display = 'block';
    });

    // cuando seleccione una fecha entonces buscara los horarios disponibles de esa fecha en especifico
    document.querySelector('#expectDate').addEventListener('change', function() {
        loadSchedules();
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

    function loadSchedules() {
        // esta funcion debera de mandarse a llamar cuando se seleccione una fecha antes no para no consumir recursos
        $.ajax({
            method: 'GET',
            url: '/api/schedules',
            data: {
                // date: document.querySelector('#expectDate').value
            },
            dataType: 'json',
            success: function(response) {
                const schedules = response.data;
                $('.expectHour').html();
                const fieldSchedules = $('.expectHour');
                schedules.forEach(element => {
                    fieldSchedules.append(`<option value='${element.Schedule}'>${element.Schedule}</option>`);
                });
            },
            error: function(response) {
                document.querySelector('.dialogErrorDatabaseButton').click();
            }
        });
    }

    var form = document.querySelector('#appointmentForm');

    form.addEventListener('submit', function(event) {

        event.preventDefault(); // evita que la pagina recargue

        const appointment = $('#appointmentForm').serialize(); // toma todos los valores de los campos

        // retroalimentacion ya busque y me quedare siemopre con esta forma de manera estandar si por alguna razon los nombres de los campos del formulario
        // con diferentes a los del modelo entonces los voy a mappear directamente en el contrador

        $.ajax({
            method: 'POST',
            url: '/api/saveAppointment',
            data: appointment,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    modalSuccess('Cita agendada con exito');
                } else {
                    modalError(
                        'Alguien más acaba de agendar, favor de recargar la página y volver a agendar'
                    );
                }
            },
            error: function(response) {
                modalError('Error en la base de datos');
            }
        });

    });
</script>