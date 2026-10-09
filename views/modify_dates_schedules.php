<button class="btnBack absolute left-1 top-1/2 -translate-y-1/2" onclick="loadPage('/list_register')">
    <svg xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="size-6">
        <path fill-rule="evenodd"
            d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
            clip-rule="evenodd" />
    </svg>
</button>

<div class="w-full md:w-1/2 mx-auto mt-3">
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-3">
        <label for="expectDate"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
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
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
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
    </div>

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
    </div>
</div>

<script>
    flatpickr(".dateAvailable", {
        dateFormat: "Y/m/d",

        // disable: [
        //     function(date) {
        //         return date.getDay() !== 0 && date.getDay() !== 6;
        //     }
        // ]
    });
</script>