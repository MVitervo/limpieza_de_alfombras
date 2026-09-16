<form class="px-4" id="addAppointmentForm">
    <div class="w-full md:w-1/2 mx-auto">
        <?php require __DIR__ . '/form.php' ?>
        <!-- <div class="grid grid-cols-1 gap-6 relative">
            <div id="calendar"></div>
        </div> -->

        <button type="submit"
            class="w-full py-2 px-4
        bg-white-500/10 text-black
        dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
        ">
            Guardar
        </button>

        <!-- <div class="bg-sky-500/10"></div> -->

    </div>
</form>

<script>
    var form = document.querySelector('#addAppointmentForm');

    form.addEventListener('submit', function(event) {

        event.preventDefault(); // evita que la pagina recargue

        const appointment = $('#addAppointmentForm').serialize(); // toma todos los valores de los campos

        // retroalimentacion ya busque y me quedare siemopre con esta forma de manera estandar si por alguna razon los nombres de los campos del formulario
        // con diferentes a los del modelo entonces los voy a mappear directamente en el contrador

        $.ajax({
            method: 'POST',
            url: '/api/saveAppointment',
            data: appointment,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    modalSuccess(response.message);
                } else {
                    modalError(
                        response.message
                    );
                }
            },
            error: function(response) {
                modalError('Error en la base de datos');
            }
        });

    });
</script>