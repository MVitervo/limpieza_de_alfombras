function modalSession(message) {

    const container = document.querySelector('.modalSession');

    container.innerHTML = `
        <el-dialog>
            <dialog
                id="dialogSessionGeneral"
                aria-labelledby="dialogErrorTitle"
                aria-describedby="dialogSessionMessage"
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
                                    Sesion expirada
                                </h2>

                                <div class="ornament mx-auto my-4 w-20"></div>

                                <p
                                    id="dialogSessionMessage"
                                    class="text-sm leading-7 text-gray-700
                                        dark:text-parchment/80">
                                </p>

                            </div>

                            <!-- Botón -->
                            <div class="mt-7">
                                <button
                                    type="button"
                                    command="close"
                                    commandfor="dialogSessionGeneral"
                                    class="btnSessionExpired inline-flex w-full items-center
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
    container.querySelector('#dialogSessionMessage').textContent = message;

    // Renderizar los iconos insertados dinámicamente.
    if (window.lucide) {
        lucide.createIcons();
    }

    document.querySelector('.btnSessionExpired').addEventListener('click', function () {
        loadPage('/login');
    });

    customElements.whenDefined('el-dialog').then(() => {

        const dialog = container.querySelector('el-dialog');

        // Evitar que se cierre con Escape.
        dialog.addEventListener('cancel', function (event) {
            event.preventDefault();
        });

        dialog.show();
    });
}

