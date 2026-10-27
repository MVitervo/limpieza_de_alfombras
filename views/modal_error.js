/* function modalError(message) {

    const container = document.querySelector('.modalError');

    container.innerHTML = `
        <el-dialog>
            <dialog
                id="dialogErrorGeneral"
                aria-labelledby="dialog-title"
                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">

                <el-dialog-backdrop
                    class="fixed inset-0
                           bg-gray-500/75
                           dark:bg-gray-950/80
                           transition-opacity
                           data-closed:opacity-0
                           data-enter:duration-300
                           data-enter:ease-out
                           data-leave:duration-200
                           data-leave:ease-in">
                </el-dialog-backdrop>

                <div
                    tabindex="0"
                    class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">

                    <el-dialog-panel
                        class="relative transform overflow-hidden rounded-lg
                               bg-white dark:bg-gray-800
                               text-left shadow-xl
                               transition-all
                               data-closed:translate-y-4
                               data-closed:opacity-0
                               data-enter:duration-300
                               data-enter:ease-out
                               data-leave:duration-200
                               data-leave:ease-in
                               sm:my-8 sm:w-full sm:max-w-lg
                               data-closed:sm:translate-y-0
                               data-closed:sm:scale-95">

                        <div
                            class="bg-white dark:bg-gray-800
                                   px-4 pt-5 pb-4
                                   sm:p-6 sm:pb-4">

                            <div class="sm:flex sm:items-start">

                                <div
                                    class="mx-auto flex size-12 shrink-0
                                           items-center justify-center
                                           rounded-full
                                           bg-red-100 dark:bg-red-900/30
                                           sm:mx-0 sm:size-10">

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        class="size-6 text-red-600 dark:text-red-400"
                                        aria-hidden="true">

                                        <path
                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-.866-3.032-.866-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />

                                    </svg>

                                </div>

                                <div
                                    class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">

                                    <h3
                                        id="dialog-title"
                                        class="text-base font-semibold text-gray-900 dark:text-white text-center">

                                        ${message}

                                    </h3>

                                </div>

                            </div>

                        </div>

                        <div
                            class="bg-olive-100 dark:bg-gray-700/50
                                   px-4 py-3
                                   sm:flex sm:flex-row-reverse sm:px-6">

                            <button
                                type="button"
                                command="close"
                                commandfor="dialogErrorGeneral"
                                class="inline-flex w-full
                                       justify-center
                                       rounded-md
                                       bg-red-600
                                       px-3 py-2
                                       text-sm font-semibold text-white
                                       shadow-xs
                                       hover:bg-red-500
                                       sm:ml-3 sm:w-auto">

                                Aceptar

                            </button>

                        </div>

                    </el-dialog-panel>

                </div>

            </dialog>
        </el-dialog>
    `;

    customElements.whenDefined('el-dialog').then(() => {

        const dialog = container.querySelector('el-dialog');

        dialog.show();

    });
}
    */
   

function modalError(message) {

    const container = document.querySelector('.modalError');

    container.innerHTML = `
        <el-dialog>
            <dialog
                id="dialogErrorGeneral"
                aria-labelledby="dialogErrorTitle"
                aria-describedby="dialogErrorMessage"
                class="fixed inset-0 size-auto max-h-none max-w-none
                    overflow-y-auto bg-transparent backdrop:bg-transparent">

                <!-- Fondo -->
                <el-dialog-backdrop
                    class="fixed inset-0 bg-ink/80 backdrop-blur-sm
                        transition-opacity
                        data-closed:opacity-0
                        data-enter:duration-300
                        data-enter:ease-out
                        data-leave:duration-200
                        data-leave:ease-in">
                </el-dialog-backdrop>

                <div
                    tabindex="0"
                    class="flex min-h-full items-center justify-center
                        p-4 text-center focus:outline-none sm:p-6">

                    <!-- Panel compacto -->
                    <el-dialog-panel
                        class="relative w-full max-w-sm overflow-hidden
                            rounded-2xl border border-gold/50
                            bg-parchment text-left shadow-gold
                            transition-all
                            data-closed:translate-y-4
                            data-closed:opacity-0
                            data-enter:duration-300
                            data-enter:ease-out
                            data-leave:duration-200
                            data-leave:ease-in
                            data-closed:sm:translate-y-0
                            data-closed:sm:scale-95
                            dark:bg-violet">

                        <!-- Franja decorativa -->
                        <div class="h-1 w-full bg-gradient-to-r
                            from-plum via-gold to-plum">
                        </div>

                        <div class="px-6 pb-7 pt-8 sm:px-7">

                            <!-- Icono de advertencia -->
                            <div class="mx-auto mb-5 flex size-16
                                items-center justify-center rounded-full
                                border border-rose-400/40 bg-rose-500/10
                                text-rose-600 shadow-sm
                                dark:text-rose-300">

                                <i data-lucide="shield-alert"
                                    class="size-8"
                                    aria-hidden="true"></i>
                            </div>

                            <!-- Mensaje -->
                            <div class="text-center">

                                <p class="mb-2 text-xs font-semibold
                                    uppercase tracking-[0.3em] text-gold">
                                    Atención
                                </p>

                                <h2
                                    id="dialogErrorTitle"
                                    class="font-display text-xl font-semibold
                                        text-gray-900 dark:text-parchment
                                        sm:text-2xl">
                                    No se pudo completar
                                </h2>

                                <div class="ornament mx-auto my-4 w-20"></div>

                                <p
                                    id="dialogErrorMessage"
                                    class="text-sm leading-7 text-gray-700
                                        dark:text-parchment/80">
                                </p>

                            </div>

                            <!-- Botón -->
                            <div class="mt-7">
                                <button
                                    type="button"
                                    command="close"
                                    commandfor="dialogErrorGeneral"
                                    class="inline-flex w-full items-center
                                        justify-center gap-2 rounded-lg
                                        border border-gold bg-gold px-5 py-3
                                        font-semibold text-gray-950 shadow-md
                                        transition-all duration-300
                                        hover:bg-gold/85 hover:shadow-gold
                                        focus:outline-none focus:ring-2
                                        focus:ring-gold/60 focus:ring-offset-2
                                        focus:ring-offset-parchment
                                        dark:focus:ring-offset-violet">

                                    <i data-lucide="check"
                                        class="size-5"
                                        aria-hidden="true"></i>

                                    Entendido
                                </button>
                            </div>

                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
    `;

    // Mostrar el mensaje como texto, no como HTML.
    container.querySelector('#dialogErrorMessage').textContent = message;

    // Renderizar los iconos insertados dinámicamente.
    if (window.lucide) {
        lucide.createIcons();
    }

    customElements.whenDefined('el-dialog').then(() => {

        const dialog = container.querySelector('el-dialog');

        // Evitar que se cierre con Escape.
        dialog.addEventListener('cancel', function (event) {
            event.preventDefault();
        });

        dialog.show();
    });
}

