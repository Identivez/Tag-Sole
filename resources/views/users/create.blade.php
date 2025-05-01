@extends('layouts.app')

@section('title','Crear Usuario')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Cambiar el combo de Entidades según el País seleccionado
    function cambiar_combo_entidad(id_pais) {
        $("#id_entidad").empty();
        $("#municipio_id").empty();
        var ruta = "{{ url('getEntitiesByCountry') }}/" + id_pais;

        $.ajax({
            type: 'GET',
            url: ruta,
            success: function(data) {
                $('#id_entidad').append('<option value="">Seleccionar ...</option>');
                data.forEach(function(entidad) {
                    $('#id_entidad').append('<option value="' + entidad.EntityId + '">' + entidad.Name + '</option>');
                });
            }
        });
    }

    // Cambiar el combo de Municipios según la Entidad seleccionada
    function cambiar_combo_municipios(id_entidad) {
        $("#municipio_id").empty();
        var ruta = "{{ url('getMunicipalitiesByEntity') }}/" + id_entidad;

        $.ajax({
            type: 'GET',
            url: ruta,
            success: function(data) {
                $('#municipio_id').append('<option value="">Seleccionar ...</option>');
                data.forEach(function(municipio) {
                    $('#municipio_id').append('<option value="' + municipio.MunId + '">' + municipio.Name + '</option>');
                });
            }
        });
    }
</script>

<h1>Crear Usuario</h1>

<!-- Mensajes de error -->
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <!-- Selección de País -->
    <label id="id_pais">Seleccionar país</label>
    <select name="id_pais" id="id_pais" onchange="cambiar_combo_entidad(this.value);" required>
        <option value="">Seleccionar...</option>
        @foreach($paises as $pais)
            <option value="{{ $pais->CountryId }}">{{ $pais->Name }}</option>
        @endforeach
    </select>

    <!-- Selección de Entidad -->
    <label id="id_entidad_lb">Seleccionar entidad</label>
    <select name="EntityId" id="id_entidad" onchange="cambiar_combo_municipios(this.value);" required>
        <option value="">Seleccionar...</option>
        @foreach($entities as $entity)
            <option value="{{ $entity->EntityId }}">{{ $entity->Name }}</option>
        @endforeach
    </select>

    <!-- Selección de Municipio -->
    <label id="municipio_id_lb">Seleccionar municipio</label>
    <select name="MunicipalityId" id="municipio_id" required>
        <option value="">Seleccionar...</option>
    </select>

    <!-- Otros campos del formulario -->
    <div class="form-group">
        <label for="firstName">Nombre</label>
        <input type="text" name="firstName" id="firstName" value="{{ old('firstName') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
    </div>

    <button type="submit" class="btn">Guardar Usuario</button>
</form>

@endsection
