@extends('template')

@section('sidebar')
        <div class="card-body">
            <img style="width: 100px; height: 100px;" src="https://cdn-icons-png.flaticon.com/512/560/560199.png" alt="Imagen de perfil" class="img-fluid rounded-circle">
            <p>Nombre administrador</p>
        </div>
        <div class="logout-button">
            <a href="#" class="btn btn-danger">Salir</a>
        </div>
@endsection

@section ('contenido')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<h1>Registrar Médico</h1>
<div class="card shadow">
    <form action="/admin" method="POST" class="container px-4 py-3">
        @csrf
        <div id="emailHelp" class="form-text">Los campos con (*) son obligatorios.</div>
        <div class="row row-cols-2">
            <div class="col mb-3">
                <label for="Username" class="form-label">Username (*)</label>
                <input type="text" class="form-control" id="UsernameInput" name="Username" readonly required>
            </div>
            <div class="col mb-3">
                <label for="Password" class="form-label">Contraseña (*)</label>
                <input type="password" class="form-control" id="PasswordInput" name="Password" readonly required>
            </div>
            <div class="col mb-3">
                <label for="DNI" class="form-label">DNI (*)</label>
                <input type="number" class="form-control" id="DNIInput" name="DNI" oninput="actualizarCampo(this.value)" pattern="[0-9]{8}" min="1" required>
            </div>
            <div class="col mb-3">
                <label for="Email" class="form-label">Email (*)</label>
                <input type="email" class="form-control" id="EmailInput" name="Email" required>
            </div>
            <div class="col mb-3">
                <label for="Phone" class="form-label">Telefono (*)</label>
                <input type="number" class="form-control" id="PhoneInput" name="Phone" required min="1">
            </div>
            <div class="col mb-3">
                <label for="Name" class="form-label">Nombre (*)</label>
                <input type="text" class="form-control" id="NameInput" name="Name" required>
            </div>
            <div class="col mb-3">
                <label for="LastName" class="form-label">Apellido (*)</label>
                <input type="text" class="form-control" id="LastNameInput" name="LastName" required>
            </div>
            <div class="col mb-3">
                <label for="LastName" class="form-label">Fecha de nacimiento (*)</label>
                <input type="date" class="form-control" id="DateOfBirthInput" name="DateOfBirth" required >
            </div>
            <div class="col mb-3">
                <label for="Address" class="form-label">Dirección (*)</label>
                <input type="text" class="form-control" id="AddressInput" name="Address" required>
            </div>
            <div class="col mb-3">
                <label for="Specialty" class="form-label">Especialidad (*)</label>
                <select class="form-select" id="SpecialtyInput" name='Specialty' required>
                    @foreach ($especialidades as $especialidad)
                        <option value={{ $especialidad->nombre }}>{{ $especialidad->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label for="Province" class="form-label">Provincia (*)</label>
                <select class="form-select" id="ProvinceInput" name='Province' required>
                    @foreach ($provincias as $provincia)
                        <option value={{ $provincia->provincia }} data-name="{{ $provincia->id }}">{{ $provincia->provincia }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label for="City" class="form-label">Ciudad (*)</label>
                <select class="form-select" id="CityInput" name='City' required>
                    @foreach ($localidades as $localidad)
                        @if ($localidad->provincia_id == 1)
                            <option value={{ $localidad->localidad }}>{{ $localidad->localidad }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('message')
                <div class="col mb-3">
                    <div class="alert alert-danger" role="alert">
                        * {{$message}}
                    </div>
                </div>
            @enderror
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/admin/" id="cancel" name="cancel" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
<script>
    function actualizarCampo(valor) {
        var campoUsername = document.getElementById('UsernameInput');
        var campoPassword = document.getElementById('PasswordInput');

        campoUsername.value = valor;
        campoPassword.value = valor;
    }

    $(document).ready(function() {
    $('#ProvinceInput').change(function() {
        var provinciaSeleccionada = $(this).find('option:selected');
        var idProvincia = provinciaSeleccionada.data('name');

        // Obtener las localidades correspondientes a la provincia seleccionada
        var localidades = <?php echo json_encode($localidades); ?>;
        var localidadesProvincia = localidades.filter(function(localidad) {
            return localidad.provincia_id === idProvincia;
        });

        // Actualizar el desplegable CityInput con las opciones obtenidas
        var options = localidadesProvincia.map(function(localidad) {
            return '<option value="' + localidad.localidad + '">' + localidad.localidad + '</option>';
        });
        $('#CityInput').html(options);
    });
});

    var today = new Date();
    var yesterday = new Date(today);
    yesterday.setDate(today.getDate() - 1);
    var yesterdayFormatted = yesterday.toISOString().split('T')[0];

    document.getElementById('DateOfBirthInput').setAttribute('max', yesterdayFormatted);
</script>
@endsection
