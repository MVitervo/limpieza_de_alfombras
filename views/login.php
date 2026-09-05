<button>
    
</button>

<form class="px-4" id="loginForm">
    <div class="w-full md:w-1/2 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-3">
            <div>
                <label for="user_name" class="block mb-2.5 text-sm font-medium text-heading text-gray-700 dark:text-gray-200">Usuario</label>
                <input
                    class="
                        w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        bg-white

                        dark:bg-gray-800
                        dark:text-white
                        dark:border-gray-600
                        dark:placeholder-gray-400
                    " type="text" id="user_name" autocomplete="off" name="user_name" required />
            </div>

            <div>
                <label for="password" class="block mb-2.5 text-sm font-medium text-heading text-gray-700 dark:text-gray-200">Contraseña</label>
                <input
                    class="
                        w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        bg-white

                        dark:bg-gray-800
                        dark:text-white
                        dark:border-gray-600
                        dark:placeholder-gray-400
                    " type="text" id="password" autocomplete="off" name="password" required />
            </div>

            <button type="submit"
                class="w-full py-2 px-4
                bg-white-500/10 text-black
                dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
                ">
                Ingresar
            </button>
        </div>
    </div>
</form>