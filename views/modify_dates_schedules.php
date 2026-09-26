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

        <input
            type="date"
            id="expectDate"
            class="w-full rounded-lg border border-gray-300 bg-white p-3 text-sm text-gray-900 shadow-sm
                focus:border-blue-500 focus:ring-2 focus:ring-blue-500
                dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-blue-400" name="date" required>
    </div>
</div>

<script>
    
</script>