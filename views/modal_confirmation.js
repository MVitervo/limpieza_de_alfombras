
function modalconfirmation(message, onConfirm, onCancel = null) {

    const container = document.querySelector('.modalConfirmation');

    container.innerHTML = `
        <el-dialog>
            <dialog
                id="dialogConfirmationGeneral"
                aria-labelledby="dialogConfirmationTitle"
                aria-describedby="dialogConfirmationMessage"
                class="fixed inset-0 size-auto max-h-none max-w-none
                    overflow-y-auto bg-transparent backdrop:bg-transparent">

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

                        <div class="h-1 w-full bg-gradient-to-r
                            from-plum via-gold to-plum">
                        </div>

                        <div class="px-6 pb-7 pt-8 sm:px-8">

                            <!-- Icono -->
                            <div class="mx-auto mb-5 flex size-16
                                items-center justify-center rounded-full
                                border border-gold/60 bg-gold/15
                                text-gold shadow-md">

                                <i data-lucide="circle-help"
                                    class="size-8"
                                    aria-hidden="true"></i>
                            </div>

                            <!-- Mensaje -->
                            <div class="text-center">

                                <p class="mb-2 text-xs font-semibold
                                    uppercase tracking-[0.3em] text-gold">
                                    Confirmación
                                </p>

                                <h2
                                    id="dialogConfirmationTitle"
                                    class="font-display text-xl font-semibold
                                        text-gray-900 dark:text-parchment
                                        sm:text-2xl">
                                    ¿Deseas continuar?
                                </h2>

                                <div class="ornament mx-auto my-4 w-20"></div>

                                <p
                                    id="dialogConfirmationMessage"
                                    class="text-sm leading-7 text-gray-700
                                        dark:text-parchment/80">
                                </p>

                            </div>

                            <!-- Botones -->
                            <div class="mt-7 grid grid-cols-2 gap-3">

                                <button
                                    type="button"
                                    command="close"
                                    commandfor="dialogConfirmationGeneral"
                                    class="btnCancelConfirmation inline-flex
                                        items-center justify-center gap-2
                                        rounded-lg border border-plum/40
                                        bg-transparent px-4 py-3
                                        text-sm font-semibold text-gray-800
                                        transition-all duration-300
                                        hover:bg-plum/10
                                        focus:outline-none focus:ring-2
                                        focus:ring-gold/60
                                        dark:border-parchment/30
                                        dark:text-parchment
                                        dark:hover:bg-parchment/10">

                                    <i data-lucide="x"
                                        class="size-4"
                                        aria-hidden="true"></i>

                                    Cancelar
                                </button>

                                <button
                                    type="button"
                                    command="close"
                                    commandfor="dialogConfirmationGeneral"
                                    class="btnConfirmConfirmation inline-flex
                                        items-center justify-center gap-2
                                        rounded-lg border border-gold
                                        bg-gold px-4 py-3
                                        text-sm font-semibold text-gray-950
                                        shadow-md transition-all duration-300
                                        hover:bg-gold/85 hover:shadow-gold
                                        focus:outline-none focus:ring-2
                                        focus:ring-gold/60">

                                    <i data-lucide="check"
                                        class="size-4"
                                        aria-hidden="true"></i>

                                    Continuar
                                </button>

                            </div>

                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
    `;

    // Insertar el mensaje de forma segura.
    container.querySelector('#dialogConfirmationMessage')
        .textContent = message;

    // Renderizar los iconos de Lucide.
    if (window.lucide) {
        lucide.createIcons();
    }

    // Botón Cancelar.
    container.querySelector('.btnCancelConfirmation')
        .addEventListener('click', function () {

            if (typeof onCancel === 'function') {
                onCancel();
            }
        });

    // Botón Continuar.
    container.querySelector('.btnConfirmConfirmation')
        .addEventListener('click', function () {

            if (typeof onConfirm === 'function') {
                onConfirm();
            }
        });

    // Mostrar el modal.
    customElements.whenDefined('el-dialog').then(() => {

        const dialog = container.querySelector('el-dialog');

        // Evitar que Escape cierre el modal.
        dialog.addEventListener('cancel', function (event) {
            event.preventDefault();
        });

        dialog.show();
    });
}
