<div class="containerTable">
    <table class="appoinmentTable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Fecha</th>
                <th>Horario</th>
                <th>Ultima fecha de modificacion</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
    $(function() {
        loadRegister();
    });

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
                dataSrc: '' // Indica que los datos están en la raíz del JSON
            },
            // los valores que recibira data estan pendientes de la tabla en la bd
            columns: [{
                    data: 'id'
                },
                {
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
                    data: 'date'
                },
                {
                    data: 'schedule'
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
</script>