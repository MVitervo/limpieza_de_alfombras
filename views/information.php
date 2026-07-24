

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

        
        <div class="grid grid-cols-1 gap-6 relative">
            <div id="calendar"></div>
        </div>

    </div>
</form>

<script>
    $(function() {
        var calendarEl = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: "dayGridMonth",
        });
        calendar.render();
    });
</script>