<form class="px-4" id="editAppointmentForm">
    <div class="w-full md:w-1/2 mx-auto">
        <input type="number" id="id" autocomplete="off" name="id" style="display: none;" />
        <?php require __DIR__ . '/form.php' ?>
        <!-- <div class="grid grid-cols-1 gap-6 relative">
            <div id="calendar"></div>
        </div> -->

        <button type="submit"
            class="w-full py-2 px-4
        bg-white-500/10 text-black
        dark:bg-white-500/10 dark:text-white font-semibold border border-gray-400 rounded shadow
        ">
            Actualizar
        </button>

        <!-- <div class="bg-sky-500/10"></div> -->

    </div>
</form>
<script>
    $(function() {
        getInformationRegister();
    });

    async function getInformationRegister() {
        const id = sessionStorage.getItem('editRegisterId');
        const idFormatter = `id=${id}`;
        const information = await $.ajax({
            method: 'GET',
            url: '/api/getInformation',
            data: idFormatter,
            dataType: 'json'
        });

        if (information.status === 'success') {
            document.querySelector('#id').value = information.data.id;
            document.querySelector('#first_name').value = information.data.name;
            document.querySelector('#lastname').value = information.data.lastname;
            document.querySelector('#email').value = information.data.email;
            document.querySelector('#phone').value = information.data.phone;
            document.querySelector('#expectDate').value = information.data.date;
            await loadSchedules(); // sirve para disparar el evento de los horarios y asi poder asignar el valor con la instruccion de abajo
            $('#expectHour').val(information.data.schedule).trigger('change');
        } else {
            modalError(information.message);
        }
    }

    var form = document.querySelector('#editAppointmentForm');

    form.addEventListener('submit', function(event) {

        event.preventDefault(); // evita que la pagina recargue

        const appointment = $('#editAppointmentForm').serialize(); // toma todos los valores de los campos
        debugger;

        $.ajax({
            method: 'POST',
            url: '/api/editRegister',
            data: appointment,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    modalSuccess(response.message);
                } else {
                    modalError(response.message);
                }
            },
            error: function(response) {
                modalError(response.message);
            }
        });

    });
</script>