/*
function modalSuccess(message) {

    const container = document.querySelector('.modalSuccess');

    container.innerHTML = `
        <el-dialog>
            <dialog
                id="dialogSuccessGeneral"
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
                                           bg-green-100 dark:bg-green-900/30
                                           sm:mx-0 sm:size-10">

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        class="size-6 text-green-600 dark:text-green-400"
                                        aria-hidden="true">

                                        <path
                                            d="m4.5 12.75 6 6 9-13.5"
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
                                commandfor="dialogSuccessGeneral"
                                class="inline-flex w-full
                                       justify-center
                                       rounded-md
                                       bg-green-600
                                       px-3 py-2
                                       text-sm font-semibold text-white
                                       shadow-xs
                                       hover:bg-green-500
                                       sm:ml-3 sm:w-auto
                                       btnDialogSuccess">

                                Aceptar

                            </button>

                        </div>

                    </el-dialog-panel>

                </div>

            </dialog>
        </el-dialog>
    `;

    document.querySelector('.btnDialogSuccess').addEventListener('click', function () {
        location.reload();
    });

    customElements.whenDefined('el-dialog').then(() => {

        const dialog = container.querySelector('el-dialog');

        // Evita que el diálogo se cierre al hacer click fuera o presionar Escape
        dialog.addEventListener('cancel', function (event) {
            event.preventDefault();
        });

        dialog.show();

    });
}
*/


function modalSuccess(message) {

    const container = document.querySelector('.modalSuccess');

    container.innerHTML = `
        <el-dialog>
            <dialog
                id="dialogSuccessGeneral"
                aria-labelledby="dialogSuccessTitle"
                aria-describedby="dialogSuccessMessage"
                class="fixed inset-0 size-auto max-h-none max-w-none
                    overflow-y-auto bg-transparent backdrop:bg-transparent">

                <!-- Fondo del modal -->
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

                    <!-- Panel principal -->
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

                        <!-- Detalle decorativo superior -->
                        <div class="h-1 w-full bg-gradient-to-r
                            from-plum via-gold to-plum">
                        </div>

                        <div class="px-6 pb-7 pt-8 sm:px-8">

                            <!-- Icono de éxito -->
                            <div class="mx-auto mb-5 flex size-16
                                items-center justify-center rounded-full
                                border border-gold/60 bg-gold/15
                                text-gold shadow-md">

                                <i data-lucide="sparkles"
                                    class="size-8"
                                    aria-hidden="true"></i>
                            </div>

                            <!-- Encabezado -->
                            <div class="text-center">

                                <p class="mb-2 text-xs font-semibold
                                    uppercase tracking-[0.3em] text-gold">
                                    Confirmación
                                </p>

                                <h2
                                    id="dialogSuccessTitle"
                                    class="font-display text-xl font-semibold
                                        text-gray-900 dark:text-parchment
                                        sm:text-2xl">
                                    ¡Operación exitosa!
                                </h2>

                                <div class="ornament mx-auto my-4 w-20"></div>

                                <p
                                    id="dialogSuccessMessage"
                                    class="text-sm leading-7 text-gray-700
                                        dark:text-parchment/80">
                                </p>

                            </div>

                            <!-- Botón -->
                            <div class="mt-7">
                                <button
                                    type="button"
                                    command="close"
                                    commandfor="dialogSuccessGeneral"
                                    class="btnDialogSuccess inline-flex w-full
                                        items-center justify-center gap-2
                                        rounded-lg border border-gold
                                        bg-gold px-5 py-3
                                        font-semibold text-gray-950
                                        shadow-md transition-all duration-300
                                        hover:bg-gold/85 hover:shadow-gold
                                        focus:outline-none focus:ring-2
                                        focus:ring-gold/60
                                        focus:ring-offset-2
                                        focus:ring-offset-parchment
                                        dark:focus:ring-offset-violet">

                                    <i data-lucide="check"
                                        class="size-5"
                                        aria-hidden="true"></i>

                                    Aceptar
                                </button>
                            </div>

                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
    `;

    // Insertar el mensaje como texto, no como HTML.
    container.querySelector('#dialogSuccessMessage').textContent = message;

    // Actualizar los iconos de Lucide después de insertar el HTML.
    if (window.lucide) {
        lucide.createIcons();
    }

    container.querySelector('.btnDialogSuccess')
        .addEventListener('click', function () {
            location.reload();
        });

    customElements.whenDefined('el-dialog').then(() => {

        const dialog = container.querySelector('el-dialog');

        // Evitar que el diálogo se cierre con Escape.
        dialog.addEventListener('cancel', function (event) {
            event.preventDefault();
        });

        dialog.show();
    });
}
