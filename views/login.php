<form id="loginForm"
    class="flex min-h-[calc(100vh-100px)] items-center justify-center px-4 py-8">

    <div class="form-panel w-full md:w-3/5 mx-auto max-w-3xl rounded-2xl p-6 shadow-gold sm:p-8">

        <!-- Encabezado -->
        <div class="mb-8 text-center">
            <p class="mb-3 font-display text-xs tracking-[.35em] text-gold">
                ANTONIO CONCARTAS
            </p>

            <h1 class="font-display text-2xl text-gray-900 dark:text-parchment sm:text-3xl">
                Iniciar sesión
            </h1>

            <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-parchment/70">
                Accede a tu espacio de administración.
            </p>

            <div class="ornament mx-auto mt-6 max-w-xs"></div>
        </div>

        <!-- Usuario -->
        <div class="mb-5">
            <label for="username"
                class="mb-2 block font-display text-xs tracking-wider text-gray-700 dark:text-parchment/90">
                Usuario
            </label>

            <input
                type="text"
                id="username"
                name="username"
                autocomplete="username"
                placeholder="Escribe tu usuario"
                required
                class="field rounded-lg" />
        </div>

        <!-- Contraseña -->
        <div class="mb-7">
            <label for="password"
                class="mb-2 block font-display text-xs tracking-wider text-gray-700 dark:text-parchment/90">
                Contraseña
            </label>

            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                placeholder="Escribe tu contraseña"
                required
                class="field rounded-lg" />
        </div>

        <!-- Botón -->
        <button
            type="submit"
            class="w-full rounded-lg border border-gold bg-gold px-4 py-3 font-display text-xs font-semibold tracking-[.2em] text-gray-950 transition duration-300 hover:bg-transparent hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2 dark:hover:text-parchment dark:focus:ring-offset-[#211829]">
            INGRESAR
        </button>

        <div class="ornament mx-auto mt-7 max-w-xs"></div>

        <p class="mt-4 text-center font-display text-[9px] tracking-[.25em] text-gray-500 dark:text-parchment/50">
            TAROT EVOLUTIVO
        </p>

    </div>
</form>

<!-- <script>
    var formLogin = document.querySelector('#loginForm');

    formLogin.addEventListener('submit', function(event) {

        event.preventDefault(); // evita que la pagina recargue

        const login = $('#loginForm').serialize(); // toma todos los valores de los campos

        $.ajax({
            method: 'POST',
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
</script> -->


<script>
    const formLogin = document.querySelector('#loginForm');

    formLogin.addEventListener('submit', function(event) {
        event.preventDefault();

        const login = $('#loginForm').serialize();

        $.ajax({
            method: 'POST',
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

            error: function(xhr) {
                console.error(xhr.responseText);
                modalError('No fue posible iniciar sesión. Inténtalo nuevamente.');
            }
        });
    });
</script>