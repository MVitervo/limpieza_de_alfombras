<div class="w-full md:w-1/2 mx-auto mt-3">
    <form class="px-4 mb-5" id="modifyDateForm">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-3">
            <label for="expectDate"
                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Seleccione la fecha para habilitarla o deshabilitarla
            </label>

            <input class="dateAvailable
            w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
            bg-white

            dark:bg-gray-800
            dark:text-white
            dark:border-gray-600
            dark:placeholder-gray-400"
                type="date" id="dateAvailable" name="dateAvailable" required />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-3">
            <label for="expectDate"
                class="block text-sm font-medium text-gray-900 dark:text-white">
                Estatus
            </label>

            <select
                class="statusDate
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
                        " name="statusDate" id="statusDate" required>
                <option value="1">Habilitado</option>
                <option value="0">Deshabilitado</option>
            </select>
        </div>

        <button type="submit"
            class="w-full py-2 px-4 mt-2
        bg-white-500/10 text-black
        dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
        ">
            Guardar
        </button>
    </form>

    <form class="px-4 mt-4" id="modifyHourForm">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-3">
            <label for="hourAvailable"
                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Seleccione el horario
            </label>

            <!-- <select
                class="hourAvailable
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
                    " name="hourAvailable" id="hourAvailable" required>
                <option value=""></option>
            </select> -->
            <select class="field hourAvailable
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
                        dark:focus:ring-indigo-400" id="hourAvailable" name="hourAvailable" required>
                <option value="" disabled selected>Selecciona un horario</option>
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-3">
            <label for="statusHour"
                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Estatus
            </label>

            <select
                class="statusHour
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
                            " name="statusHour" id="statusHour" required>
                <option value="1">Habilitado</option>
                <option value="0">Deshabilitado</option>
            </select>
        </div>

        <button type="submit"
            class="w-full py-2 px-4 mt-2
        bg-white-500/10 text-black
        dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
        ">
            Guardar
        </button>
    </form>

</div>

<link rel="stylesheet" href="/css/modify_dates_schedules.css">

<script>
    $(function() {
        // findAppointments();
        $('.hourAvailable').select2({
            theme: 'bootstrap-5',
            placeholder: 'Seleccionar fecha',
            width: '100%'
        });
    });

    // cuando seleccione una fecha entonces buscara los horarios disponibles de esa fecha en especifico
    document.querySelector('#dateAvailable').addEventListener('change', function() {
        reloadSchedules();
    });

    async function reloadSchedules() {
        // esta funcion debera de mandarse a llamar cuando se seleccione una fecha antes no para no consumir recursos
        const schedules = await $.ajax({
            method: 'GET',
            url: '/api/schedules',
            dataType: 'json',
        });

        if (schedules.status === 'success') {
            // const schedules = response.data;
            $('.hourAvailable').empty();
            $('.hourAvailable').append('<option value=""></option>')
            const fieldSchedules = $('.hourAvailable');
            schedules.data.forEach(element => {
                fieldSchedules.append(`<option value='${element.Schedule}'>${element.Schedule}</option>`);
            });
        } else {
            modalError(schedules.message);
        }
    }

    flatpickr(".dateAvailable", {
        dateFormat: "Y/m/d",

        // esta funcion por defecto pone de colores verdes a los fines de semana y en rojo todos los demas
        onDayCreate: function(dObj, dStr, fp, dayElem) {

            const dayOfWeek = dayElem.dateObj.getDay();

            if (dayOfWeek === 0 || dayOfWeek === 6) {
                // Sábado y domingo: verde
                dayElem.classList.add("weekend-green");
            } else {
                // Lunes a viernes: rojo
                dayElem.classList.add("weekday-red");
            }
        },

        // llamada que hace la consulta a todas las excepciones
        onReady: function(selectedDates, dateStr, instance) {
            debugger;
            // continuar
            $.ajax({
                method: "GET",
                url: "/api/getDatesSchedules",
                dataType: "json",
                success: function(response) {
                    debugger;
                    console.log("Respuesta del servidor:", response);
                },

                error: function(xhr, status, error) {
                    debugger;
                    console.error("Error en AJAX:", error);
                }
            });

        }
    });

    var dateForm = document.querySelector('#modifyDateForm');
    var hourForm = document.querySelector('#modifyHourForm');

    dateForm.addEventListener('submit', function(event) {
        event.preventDefault(); // evita que la pagina recargue

        const date = $('#modifyDateForm').serialize(); // toma todos los valores de los campos
        debugger;
        $.ajax({
            method: 'POST',
            url: '/api/modifyDate',
            data: date,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    modalSuccess(response.message);
                    // loadPage('/list_register');
                } else {
                    modalError(response.message);
                }
            },
            error: function(error) {
                modalError(error);
            }

        });
    });

    hourForm.addEventListener('submit', function(event) {
        event.preventDefault(); // evita que la pagina recargue

        const date = $('#modifyDateForm').serialize(); // toma todos los valores de los campos
        const hour = $('#modifyHourForm').serialize(); // toma todos los valores de los campos
        const dateHour = date + '&' + hour;
        debugger;
        $.ajax({
            method: 'POST',
            url: '/api/modifyHour',
            data: dateHour,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    modalSuccess(response.message);
                } else {
                    modalError(response.message);
                }
            },
            error: function(error) {
                modalError(error);
            }

        });
    });
</script>