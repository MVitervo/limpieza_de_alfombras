<!-- <button class="btnBack2" onclick="loadPage('/login')">
    <svg xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="size-6">
        <path fill-rule="evenodd"
            d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
            clip-rule="evenodd" />
    </svg>
</button> -->

<!-- <div class="rounded-lg border border-gray-200 bg-white shadow-sm
        dark:border-gray-700 dark:bg-gray-900">
    <div class="w-10/12 mx-auto">
        <button onclick="loadPage('/add_register')" class="py-2 px-4 mt-2
            bg-white-500/10 text-black
            dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
            ">
            Agregar
        </button>
        <button onclick="loadPage('/modify_dates_schedules')" class="py-2 px-4 mt-2
            bg-white-500/10 text-black
            dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
            ">
            Editar horarios
        </button>
    </div>

    <div class="border-b border-gray-200 px-4 py-3 font-semibold
            dark:border-gray-700 dark:text-white
            w-10/12 mx-auto">
        <h2>Lista de registros</h2>
    </div>

    <div class="p-4">
        <div class="containerTable w-10/12 mx-auto">
            <table class="appoinmentTable w-full">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Ultima fecha de modificacion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</div> -->


<div class="form-panel w-11/12 mx-auto rounded-2xl border border-gold/40
    p-4 shadow-gold transition-colors duration-300 sm:p-6 lg:p-8 mb-4">

    <!-- Encabezado y acciones -->
    <div class="mb-6 flex flex-col gap-4 border-b border-gold/30 pb-5
        sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="mb-1 text-xs uppercase tracking-[0.3em] text-gold">
                Administración
            </p>

            <h2 class="font-display text-xl font-semibold text-gray-900
                dark:text-parchment sm:text-2xl">
                Lista de registros
            </h2>

            <p class="mt-2 text-sm text-gray-600 dark:text-parchment/60">
                Consulta y administra las citas registradas.
            </p>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap">
            <button
                type="button"
                onclick="loadPage('/add_register')"
                class="inline-flex items-center justify-center gap-2 rounded-lg
                    border border-gold bg-gold px-4 py-2.5 font-semibold
                    text-gray-950 shadow-md transition-all duration-300
                    hover:bg-gold/80 hover:shadow-gold
                    focus:outline-none focus:ring-2 focus:ring-gold/60">

                <i data-lucide="plus" class="size-5"></i>
                Agregar registro
            </button>

            <button
                type="button"
                onclick="loadPage('/modify_dates_schedules')"
                class="inline-flex items-center justify-center gap-2 rounded-lg
                    border border-gold/50 bg-white/60 px-4 py-2.5
                    font-semibold text-gray-800 transition-all duration-300
                    hover:border-gold hover:bg-gold/10
                    dark:bg-violet/60 dark:text-parchment
                    dark:hover:bg-gold/10
                    focus:outline-none focus:ring-2 focus:ring-gold/60">

                <i data-lucide="calendar-clock" class="size-5"></i>
                Editar horarios
            </button>
        </div>
    </div>

    <!-- Tabla -->
    <div class="containerTable w-full overflow-x-auto rounded-xl
        border border-gold/30 bg-white/70
        dark:bg-ink/50">

        <table class="appoinmentTable w-full min-w-[1000px] border-collapse
            text-left text-sm">

            <thead class="bg-gold/10 text-xs uppercase tracking-wider
                text-gray-700 dark:text-gold">

                <tr>
                    <th class="whitespace-nowrap border-b border-gold/30
                        px-4 py-4 font-semibold">Nombre</th>

                    <th class="whitespace-nowrap border-b border-gold/30
                        px-4 py-4 font-semibold">Apellido</th>

                    <th class="whitespace-nowrap border-b border-gold/30
                        px-4 py-4 font-semibold">Correo</th>

                    <th class="whitespace-nowrap border-b border-gold/30
                        px-4 py-4 font-semibold">Teléfono</th>

                    <th class="whitespace-nowrap border-b border-gold/30
                        px-4 py-4 font-semibold">Fecha</th>

                    <th class="whitespace-nowrap border-b border-gold/30
                        px-4 py-4 font-semibold">Horario</th>

                    <th class="whitespace-nowrap border-b border-gold/30
                        px-4 py-4 font-semibold">
                        Última modificación
                    </th>

                    <th class="whitespace-nowrap border-b border-gold/30
                        px-4 py-4 text-center font-semibold">Opciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gold/15 text-gray-800
                dark:text-parchment/90">
            </tbody>
        </table>
    </div>

    <p class="mt-3 text-xs text-gray-500 dark:text-parchment/50">
        Desliza horizontalmente la tabla para consultar todas las columnas.
    </p>
</div>


<script>
    $(function() {
        loadRegister();
    });

    // document.querySelector('#contentButtonTheme').style.display = 'block';

    function loadRegister() {
        $('.appoinmentTable').DataTable({
            language: {
                // url: '/config/datatables-bs5/language-spanish.json',
                emptyTable: 'No hay datos disponibles'
            },
            ordering: false,
            // dom: '<"row mb-2"<"col-md-5"f><"col-md-7 d-flex justify-content-end switch"B>>rt<"row"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',
            /*
            buttons: [{
                    text: 'Imprimir <span class="material-symbols-rounded" style="font-size:20px;top:5px;">print</span>',
                    className: 'registrosDataTables',
                    action: function(e, dt, node, config) {
                        etiquetasMultiples();
                    }
                },
                {
                    text: 'Filtros <span class="material-symbols-rounded" style="left: 0 !important; font-size:20px;top:5px;">filter_alt_off</span>',
                    className: 'btn btn-secondary btn-filtro-fechas',
                    action: function(e, dt, node, config) {
                        $('#modal_filtro_fechas').modal('show');
                    }
                },
                {
                    extend: 'colvis',
                    text: 'Mostrar'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    orientation: 'landscape',
                    filename: 'Moldeo',
                    title: 'Moldeo',
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Moldeo',
                    text: 'PDF',
                    className: 'btn-danger',
                },
            ],
            */
            // colReorder: true,
            // keys: false,
            ajax: {
                method: 'GET',
                url: '/api/listRegister',
                // data: function(value) {
                //     value.fecha_inicial = $('#fecha_inicial').val() || '2000-01-01';
                //     value.fecha_final = $('#fecha_final').val() || new Date().toISOString().split('T')[0];
                // },
                dataSrc: 'data' // Indica que los datos están en la raíz del JSON
            },
            // los valores que recibira data estan pendientes de la tabla en la bd
            columns: [{
                    data: 'name'
                },
                {
                    data: 'lastname'
                },
                {
                    data: 'email'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'date',
                    width: '10%'
                },
                {
                    data: 'schedule',
                    render: function(data, type, row) {
                        return `<div class="whitespace-normal">
                            ${data}
                        </div>`;
                    }
                },
                {
                    data: 'lastEditDt',
                    // render: function(data, type, row) {
                    //     return `
                    //         <div class="registrosDataTables" style="display: flex;">
                    //             ${data}
                    //         </div>
                    //     `;
                    // }
                },
                {
                    data: 'options'
                }
            ],
            // order: [[0, 'desc']],
            // rowGroup: {
            //     dataSrc: 'folio' // Aquí le indicas que agrupe por "folio"
            // },
            initComplete: function(settings, json) {
                // let windowHeight = $(window).height();
                // let pagelen = (windowHeight * 0.64) / 29;
                // $('#tabla_historial').DataTable().page.len(pagelen).draw();
                // $('.loader').remove();
                // $('.tab-1').fadeIn();
                // $('.registrosDataTables').eq(0).css('display', ''); // remueve el display: flex solo de la primera fila
            }
        });
    }

    function editRegister(id) {
        // window.id = id;
        sessionStorage.setItem('editRegisterId', id);
        loadPage('/edit_register'); // ya muestra la vista
    }

    function deleteRegister(id) {
        const idFormatter = `id=${id}`;
        // agregar un aviso para poder confirmar la eliminacion
        modalconfirmation(
            'Esta acción eliminará el registro seleccionado. ¿Deseas continuar?',

            function() {

                $.ajax({
                    method: 'POST',
                    url: '/api/deleteRegister',
                    data: idFormatter,
                    dataType: 'json',
                    success: function(response) {
                        debugger;
                        if (response.status === 'success') {
                            modalSuccess(response.message);
                        } else {
                            modalSuccess(response.message);
                        }
                    },
                    error: function(error) {
                        debugger;
                        modalSuccess(error.message);
                    }
                });

            }
        );
        /*
        $.ajax({
            method: 'POST',
            url: '/api/deleteRegister',
            data: idFormatter,
            dataType: 'json',
            success: function(response) {
                debugger;
                if (response.status === 'success') {
                    modalSuccess(response.message);
                } else {
                    modalSuccess(response.message);
                }
            },
            error: function(error) {
                debugger;
                modalSuccess(error.message);
            }
        });
        */
    }
</script>