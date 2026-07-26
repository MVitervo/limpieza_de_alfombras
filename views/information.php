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
                <label for="last_name" class="block mb-2.5 text-sm font-medium text-heading text-gray-700 dark:text-gray-200">Last name</label>
                <input
                    class="
                        w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        bg-white

                        dark:bg-gray-800
                        dark:text-white
                        dark:border-gray-600
                        dark:placeholder-gray-400
                    " placeholder="John" type="text" id="last_name" required />
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
                        class="
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
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
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
    /*
    $(function() {
        var calendarEl = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: "dayGridMonth",
        });
        calendar.render();
    });
    */
</script>