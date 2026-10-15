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
                type="date" id="dateAvailable" name="date" required />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-3">
            <label for="expectDate"
                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
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
            class="w-full py-2 px-4
        bg-white-500/10 text-black
        dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
        ">
            Guardar
        </button>
    </form>

    <form class="px-4" id="modifyHourForm">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-3">
            <label for="selectHour"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Seleccione el horario
            </label>

            <select
                class="selectHour
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
                    " name="selectHour" id="selectHour" required>
                <option value=""></option>
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-3">
            <label for="statusHour"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
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
            class="w-full py-2 px-4
        bg-white-500/10 text-black
        dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
        ">
            Guardar
        </button>
    </form>

</div>

<script>
    flatpickr(".dateAvailable", {
        dateFormat: "Y/m/d",

        onChange: function(selectedDates, dateStr, instance) {
            debugger;
            // continuar
            $.ajax({
                method: "GET",
                url: "/api/schedules",
                dataType: "json",
                success: function(response) {
                    console.log("Respuesta del servidor:", response);
                },

                error: function(xhr, status, error) {
                    console.error("Error en AJAX:", error);
                }
            });

        }
    });
</script>