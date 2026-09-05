<div class="w-full md:w-1/2 mx-auto px-4">
    <div class="grid grid-cols-1 gap-6 mb-3">
        <!-- Cambio de tema -->
        <button id="toggle-theme" class="px-2 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded transition-colors duration-300 mt-4 ml-4">
            🌙
        </button>
    </div>
</div>

<form class="px-4" id="appointmentForm">
    <div class="w-full md:w-1/2 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-3">
            <div>
                <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading text-gray-700 dark:text-gray-200">First name</label>
                <input
                    class="
                        w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        bg-white

                        dark:bg-gray-800
                        dark:text-white
                        dark:border-gray-600
                        dark:placeholder-gray-400
                    " placeholder="John" type="text" id="first_name" autocomplete="off" name="name" required />
            </div>

            <div>
                <label for="lastname" class="block mb-2.5 text-sm font-medium text-heading text-gray-700 dark:text-gray-200">Last name</label>
                <input
                    class="
                        w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        bg-white

                        dark:bg-gray-800
                        dark:text-white
                        dark:border-gray-600
                        dark:placeholder-gray-400
                    " placeholder="John" type="text" name="lastname" id="lastname" autocomplete="off" name="lastname" required />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-3">
            <div>
                <div class="mb-4">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                    </label>

                    <input
                        type="text"
                        id="email"
                        name="email"
                        class="w-full rounded-lg border border-gray-300 bg-white p-3 text-sm text-gray-900 shadow-sm
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500
                       dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-400"
                        placeholder="correo@gmail.com" autocomplete="off" name="email">
                </div>
            </div>

            <div>
                <div class="mb-4">
                    <label for="phone"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Phone
                    </label>

                    <input
                        type="number"
                        id="phone"
                        name="phone"
                        class="w-full rounded-lg border border-gray-300 bg-white p-3 text-sm text-gray-900 shadow-sm
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500
                       dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-400"
                        placeholder="+1 915 123 456789" autocomplete="off" name="phone" required>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-3">
            <div>
                <div class="mb-4">
                    <label for="expectDate"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Date
                    </label>

                    <input
                        type="date"
                        id="expectDate"
                        class="w-full rounded-lg border border-gray-300 bg-white p-3 text-sm text-gray-900 shadow-sm
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500
                       dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-400" name="date" required>
                </div>
            </div>

            <div>
                <div class="mb-4">
                    <label for="expectHour"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Hour
                    </label>

                    <select
                        class="expectHour
                            w-full
                            rounded-lg
                            border border-gray-300
                            bg-white
                            px-4 py-2
                            text-sm text-gray-900
                            shadow-sm
                            focus:border-indigo-500
                            focus:outline-none
                            focus:ring-2
                            focus:ring-indigo-500

                            dark:bg-gray-800
                            dark:border-gray-600
                            dark:text-white
                            dark:focus:border-indigo-400
                            dark:focus:ring-indigo-400
                        " name="schedule" required>
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>
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

<div class="modalError">
</div>

<div class="modalSuccess">
</div>
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
        // loadSchedules();
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

    const form = document.querySelector('#appointmentForm');

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
                    // continuar 
                    // const modal = modalError('Alguien mas acaba de agendar, favor de recargar la pagina y volver agendar');
                    // document.querySelector('.modalError').innerHTML = modal;
                    // const dialog = document.querySelector('el-dialog');
                    // dialog.show(); // continuar revisar por que no funciona esta instruccion
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