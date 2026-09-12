<div class="rounded-lg border border-gray-200 bg-white shadow-sm
        dark:border-gray-700 dark:bg-gray-900">

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

</div>



<script>
    $(function() {
        loadRegister();
    });

    document.querySelector('#contentButtonTheme').style.display = 'block';

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
        loadPage('/edit_register'); // ya muestra la vista
        // continuar cargar los datos con un ajax
        // solo como nota hay que revisar la parte del factory para solo manejar uno y tambien los botones 
        // de hacia atras como en el login y en el editar registro
    }

    function deleteRegister(id) {
        const idFormatter = `id=${id}`;
        $.ajax({
            method: 'POST',
            url: '/api/deleteRegister',
            data: idFormatter,
            dataType: 'json',
            success: function(response) {
                debugger;
                if (response.status === 'success') {
                    modalSuccess(response.message);
                }
                else {
                    modalSuccess(response.message);
                }
            },
            error: function (error) {
                debugger;
                modalSuccess(error.message);
            }
        });
    }
</script>