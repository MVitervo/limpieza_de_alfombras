<form class="px-4" id="appointmentForm">
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

        <button type="submit">Guardar</button>
    </div>
</form>

<!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
<button command="show-modal" commandfor="dialog" class="rounded-md bg-gray-950/5 px-2.5 py-1.5 text-sm font-semibold text-gray-900 hover:bg-gray-950/10">Open dialog</button>
<el-dialog>
    <dialog id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
        <el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

        <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
            <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-red-600">
                                <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 id="dialog-title" class="text-base font-semibold text-gray-900">Deactivate account</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" command="close" commandfor="dialog" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                    <button type="button" command="close" commandfor="dialog" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </el-dialog-panel>
        </div>
    </dialog>
</el-dialog>


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
        debugger;
        // esta funcion debera de mandarse a llamar cuando se seleccione una fecha antes no para no consumir recursos
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
                debugger;
                // mensaje de que todo funciono
            },
            error: function(response) {
                debugger;
                // mensaje de que hubo un error
            }
        });

    });
</script>