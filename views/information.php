<form class="px-4">
    <div class="w-full md:w-1/2 mx-auto">
        <div class="grid grid-cols-2 gap-6 mb-3">
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
                    " placeholder="John" type="text" id="first_name" required />
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
                    " placeholder="John" type="text" name="lastname" id="lastname" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-3">
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
                        placeholder="correo@gmail.com">
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
                        placeholder="+1 915 123 456789">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-3">
            <div>
                <div class="mb-4">
                    <label for="expectDate"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Date
                    </label>

                    <input
                        type="date"
                        id="expectDate"
                        name="expectDate"
                        class="w-full rounded-lg border border-gray-300 bg-white p-3 text-sm text-gray-900 shadow-sm
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-500
                       dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-400">
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
                        ">
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>
        <!-- <div class="grid grid-cols-1 gap-6 relative">
            <div id="calendar"></div>
        </div> -->

    </div>
</form>

<script>
    // continuar con la logica del controlador y del servicio siguiendo el modelo
    $(function() {
        // findAppointments();
        $('.expectHour').select2({
            theme: 'bootstrap-5',
            placeholder: 'first select a date',
        });
        // loadSchedules();
    });

    // cuando seleccione una fecha entonces buscara los harios disponibles de esa fecha en especifico
    document.querySelector('#expectDate').addEventListener('change', function() {
        // loadSchedules();
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
        debugger;
        // esta funcion debera de mandarse a llamar cuando se seleccione una fecha antes no para no consumir recursos
        $.ajax({
            method: 'GET',
            url: '/api/schedules',
            data: {
                date: document.querySelector('#expectDate').value
            },
            dataType: 'json',
            success: function(response) {
                debugger;
                const schedules = response.data;
                $('.expectHour').html();
                const fieldSchedules = $('.expectHour');
                schedules.forEach(element => {
                    fieldSchedules.append(`<option value='${element.Schedule}'>${element.Schedule}</option>`);
                });
            },
            error: function(response) {
                debugger;
            }
        });
    }
</script>