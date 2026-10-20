<section id="cita" class="form-panel relative mx-auto w-full max-w-2xl rounded-[24px] p-5 text-[#24182b] sm:p-7 md:p-9 dark:text-parchment">
    <div class="mb-7 flex items-center justify-center gap-4 text-gold">
        <div class="ornament flex-1"></div>
        <span class="text-2xl">✦</span>
        <div class="ornament flex-1"></div>
    </div>

    <div class="mb-6 text-center">
        <h2 class="font-display text-xl sm:text-2xl">Reserva tu sesión</h2>
        <p class="mt-2 text-xs leading-5 text-stone-600 dark:text-stone-300">Completa tus datos para agendar tu lectura.</p>
    </div>
    <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
        <div>
            <label for="first_name" class="mb-2 flex items-center gap-2 text-sm font-medium text-[#392b3c] dark:text-parchment">
                <i data-lucide="user-round" class="h-5 w-5 text-[#a87943]"></i> Nombre
            </label>
            <input class="field" type="text" id="first_name" name="name" placeholder="Ingresa tu nombre" autocomplete="given-name" required>

        </div>

        <div>
            <label for="lastname" class="mb-2 flex items-center gap-2 text-sm font-medium text-[#392b3c] dark:text-parchment">
                <i data-lucide="user-round" class="h-5 w-5 text-[#a87943]"></i> Apellido
            </label>
            <input class="field" type="text" id="lastname" name="lastname" placeholder="Ingresa tu apellido" autocomplete="family-name" required>
        </div>

        <div>
            <label for="email" class="mb-2 flex items-center gap-2 text-sm font-medium text-[#392b3c] dark:text-parchment">
                <i data-lucide="mail" class="h-5 w-5 text-[#a87943]"></i> Correo electrónico
            </label>
            <input class="field" type="email" id="email" name="email" placeholder="ejemplo@correo.com" autocomplete="email" required>
        </div>

        <div>
            <label for="phone" class="mb-2 flex items-center gap-2 text-sm font-medium text-[#392b3c] dark:text-parchment">
                <i data-lucide="phone" class="h-5 w-5 text-[#a87943]"></i> Teléfono
            </label>
            <input class="field" type="tel" id="phone" name="phone" placeholder="Ingresa tu número de teléfono" autocomplete="tel" required>
        </div>

        <div>
            <label for="expectDate" class="mb-2 flex items-center gap-2 text-sm font-medium text-[#392b3c] dark:text-parchment">
                <i data-lucide="calendar-days" class="h-5 w-5 text-[#a87943]"></i> Fecha
            </label>
            <input class="field dateManagement" type="date" id="expectDate" name="date" required>
        </div>

        <div>
            <label for="expectHour" class="mb-2 flex items-center gap-2 text-sm font-medium text-[#392b3c] dark:text-parchment">
                <i data-lucide="clock-3" class="h-5 w-5 text-[#a87943]"></i> Horario
            </label>
            <select class="field" id="expectHour" name="schedule" required>
                <option value="" disabled selected>Selecciona un horario</option>
            </select>
        </div>
    </div>
</section>
<!-- 
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
            <input class="dateManagement
            w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
            bg-white

            dark:bg-gray-800
            dark:text-white
            dark:border-gray-600
            dark:placeholder-gray-400"
                type="date" id="expectDate" name="date" required />
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
                        " name="schedule" id="expectHour" required>
                <option value=""></option>
            </select>
        </div>
    </div>
</div> -->

<script>
    $(function() {
        // findAppointments();
        $('.expectHour').select2({
            theme: 'bootstrap-5',
            placeholder: 'first select a date',
            width: '100%'
        });
    });

    // cuando seleccione una fecha entonces buscara los horarios disponibles de esa fecha en especifico
    document.querySelector('#expectDate').addEventListener('change', function() {
        loadSchedules();
    });

    async function loadSchedules() {
        // esta funcion debera de mandarse a llamar cuando se seleccione una fecha antes no para no consumir recursos
        const schedules = await $.ajax({
            method: 'GET',
            url: '/api/schedules',
            dataType: 'json',
        });

        if (schedules.status === 'success') {
            // const schedules = response.data;
            $('.expectHour').empty();
            $('.expectHour').append('<option value=""></option>')
            const fieldSchedules = $('.expectHour');
            schedules.data.forEach(element => {
                fieldSchedules.append(`<option value='${element.Schedule}'>${element.Schedule}</option>`);
            });
        } else {
            modalError(schedules.message);
        }
        /*
        $.ajax({
            method: 'GET',
            url: '/api/schedules',
            data: {
                // date: document.querySelector('#expectDate').value
            },
            dataType: 'json',
            success: function(response) {
                debugger;
                const schedules = response.data;
                $('.expectHour').empty();
                $('.expectHour').append('<option value=""></option>')
                const fieldSchedules = $('.expectHour');
                schedules.forEach(element => {
                    fieldSchedules.append(`<option value='${element.Schedule}'>${element.Schedule}</option>`);
                });
            },
            error: function(response) {
                document.querySelector('.dialogErrorDatabaseButton').click();
            }
        });
        */
    }

    flatpickr(".dateManagement", {
        dateFormat: "Y/m/d",

        disable: [
            function(date) {
                return date.getDay() !== 0 && date.getDay() !== 6;
            }
        ]
    });
</script>