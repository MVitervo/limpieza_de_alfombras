<button class="btnBack absolute left-1 top-1/2 -translate-y-1/2" onclick="loadPage('/')">
    <svg xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="size-6">
        <path fill-rule="evenodd"
            d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
            clip-rule="evenodd" />
    </svg>
</button>

<form id="loginForm"
    class="
        min-h-screen
        flex
        items-center
        justify-center
        px-4
    ">
    <div class="w-full md:w-1/2 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mb-3">
            <div>
                <label for="username" class="block mb-2.5 text-sm font-medium text-heading text-gray-700 dark:text-gray-200">Usuario</label>
                <input
                    class="
                        w-full rounded-lg border border-gray-300 px-4 py-2 text-gray-900 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
                        bg-white

                        dark:bg-gray-800
                        dark:text-white
                        dark:border-gray-600
                        dark:placeholder-gray-400
                    " type="text" id="username" autocomplete="off" name="username" required />
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
                    " type="password" id="password" autocomplete="off" name="password" required />
            </div>

        </div>
        <br />
        <button type="submit"
            class="w-full py-2 px-4
            bg-white-500/10 text-black
            dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
            ">
            Ingresar
        </button>
    </div>
</form>

<script>
    // document.querySelector('.btnBack').style.display = 'block';
    // sdocument.querySelector('#contentButtonTheme').style.display = 'none';
    document.querySelector('.btnBack').style.display = 'block';

    var formLogin = document.querySelector('#loginForm');

    formLogin.addEventListener('submit', function(event) {

        event.preventDefault(); // evita que la pagina recargue

        const login = $('#loginForm').serialize(); // toma todos los valores de los campos

        $.ajax({
            method: 'GET',
            url: '/api/login',
            data: login,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    loadPage('/list_register');
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