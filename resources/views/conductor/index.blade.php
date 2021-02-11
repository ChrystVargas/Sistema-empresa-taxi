@extends('layouts.app')

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Lista de conductores</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Nuevo Conductor</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail"
            aria-selected="false">Detalles del conductor</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <br>
        <table id="tabla" class="table table-hover">
            <thead>
                <td>ID</td>
                <td>N° de auto</td>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Dueño del auto</td>
                <td>N° de brevete</td>
                <td>Observaciones</td>
                <td>Acciones</td>
            </thead>
        </table>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <br>
        <form id="crear-conductor">
            @csrf
            <input type="hidden" id="idConductor" name="id">

            <div class="form-group row">
                <label for="nro_auto" class="col-md-4 col-form-label text-md-right">N° de auto</label>

                <div class="col-md-6">
                    <input id="nro_auto" type="text" class="form-control @error('nro_auto') is-invalid @enderror" name="nro_auto" value="{{ old('nro_auto') }}" autocomplete="nro_auto" autofocus>

                    @error('nro_auto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="surname" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                <div class="col-md-6">
                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                    @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="dueno_auto" class="col-md-4 col-form-label text-md-right">Dueño del auto</label>

                <div class="col-md-6">
                    <input id="dueno_auto" type="text" class="form-control @error('dueno_auto') is-invalid @enderror" name="dueno_auto" value="{{ old('dueno_auto') }}" autocomplete="dueno_auto" autofocus>

                    @error('dueno_auto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="dni" class="col-md-4 col-form-label text-md-right">DNI</label>

                <div class="col-md-6">
                    <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" autocomplete="dni" autofocus>

                    @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="nro_brevete" class="col-md-4 col-form-label text-md-right">N° de brevete</label>

                <div class="col-md-6">
                    <input id="nro_brevete" type="text" class="form-control @error('nro_brevete') is-invalid @enderror" name="nro_brevete" value="{{ old('nro_brevete') }}" autocomplete="nro_brevete" autofocus>

                    @error('nro_brevete')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>

                <div class="col-md-6">
                    <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" autocomplete="direccion" autofocus>

                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="fecha_ingreso" class="col-md-4 col-form-label text-md-right">Fecha de ingreso a la empresa</label>

                <div class="col-md-6">
                    <input class="form-control @error('fecha_ingreso') is-invalid @enderror" type="date" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}" id="fecha_ingreso" autocomplete="fecha_ingreso" autofocus>

                    @error('fecha_ingreso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="observaciones" class="col-md-4 col-form-label text-md-right">Observaciones</label>

                <div class="col-md-6">
                    <textarea name="observaciones" id="observaciones" class="form-control @error('observaciones') is-invalid @enderror" autocomplete="observaciones">{{ old('observaciones') }}</textarea>

                    @error('observaciones')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn-insertar btn btn-primary">
                        Crear nuevo conductor
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
        <br>
        <h1>Detalles</h1>
    </div>
</div>

    {{-- MODALES --}}
    <!-- Modal Eliminar -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <i></i>
                    </button>
                </div>
                <div class="modal-body">
                    Desea eliminar el registro seleccionado?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        aria-hidden="true">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar"
                        name="btnEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

{{-- Script cargar tabla --}}
<script>
    $(document).ready(function() {
        //Ocultar tab de detalles de cliente
        $('#detail-tab').hide();

        var tablaconductores = $('#tabla').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('conductor.index') }}"
            },
            columns: [
                {data: 'id'},
                {data: 'nro_auto'},
                {data: 'name'},
                {data: 'surname'},
                {data: 'dueno_auto'},
                //{data: 'dni'},
                {data: 'nro_brevete'},
                //{data: 'direccion'},
                //{data: 'fecha_ingreso'},
                {data: 'observaciones'},
                {data: 'action', orderable: false}
            ]
        });
    });
</script>

{{-- Script guardar datos --}}
<script>
    $(document).on('submit',"#crear-conductor",function (e) {
        e.preventDefault();

        var _nro_auto = $('#nro_auto').val();
        var _name = $('#name').val();
        var _surname = $('#surname').val();
        var _dueno_auto = $('#dueno_auto').val();
        var _dni = $('#dni').val();
        var _nro_brevete = $('#nro_brevete').val();
        var _direccion = $('#direccion').val();
        var _fecha_ingreso = $('#fecha_ingreso').val();
        var _observaciones = $('#observaciones').val();
        var _token = $("input[name='_token']").val();

        $.ajax({
            type: "POST",
            url: "{{ route('conductor.insertar') }}",
            data: {
                nro_auto: _nro_auto,
                name: _name,
                surname: _surname,
                dueno_auto: _dueno_auto,
                dni: _dni,
                nro_brevete: _nro_brevete,
                direccion: _direccion,
                fecha_ingreso: _fecha_ingreso,
                observaciones: _observaciones,
                _token: _token,
            },
            beforeSend: function() {
                $('.btn-insertar').text('Insertando...');
            },
            success: function(response) {
                if (response) {
                    $('#crear-conductor')[0].reset();
                    toastr.success('El conductor se inserto correctamente.', 'Nuevo Registro',{timeOut: 3000});
                    $('#tabla').DataTable().ajax.reload();

                    $('.btn-insertar').text('Crear nuevo conductor');
                }
            }
        });
    });
</script>

{{-- Script eliminar registros --}}
<script>
    var _id;
    var _url;

    $(document).on('click', '.eliminar', function() {
        _id = $(this).attr('id');
        $('#confirmModal').modal('show');
        _url = "{{ route('conductor.eliminar') }}/" + _id;
    });

    $('#btnEliminar').click(function(e) {
        e.preventDefault();

        $.ajax({
            type: "GET",
            url: _url,
            beforeSend: function() {
                $('#btnEliminar').text('Eliminando...');
            },
            success: function(response) {
                setTimeout(function() {
                    $('#confirmModal').modal('hide');
                    toastr.warning('El registro fue eleminado correctamente.',
                        'Eliminar registro', {
                            timeOut: 3000
                        });
                    $('#tabla').DataTable().ajax.reload();
                }, 2000);
                setTimeout(function() {
                    $('#btnEliminar').text('Eliminar');
                }, 3000);
            }
        });
    });

</script>

{{-- Script editar registro --}}
<script>
    $(document).on('click', '.editar', function() {
        let _id = $(this).attr('id');
        let _url = "{{ route('conductor.editar') }}/" + _id;

        $.get(_url, function(conductor) {

            $('#idConductor').val(conductor.id);
            $('#nro_auto').val(conductor.nro_auto);
            $('#name').val(conductor.name);
            $('#surname').val(conductor.surname);
            $('#dueno_auto').val(conductor.dueno_auto);
            $('#dni').val(conductor.dni);
            $('#nro_brevete').val(conductor.nro_brevete);
            $('#direccion').val(conductor.direccion);
            $('#fecha_ingreso').val(conductor.fecha_ingreso);
            $('#observaciones').val(conductor.observaciones);

            $('input[name=_token]').val();
            $('#profile-tab').click();
            $('#profile-tab').text('Editar Conductor');

            $('#crear-conductor').prop("id","editar-conductor");
            $('.btn-insertar').text('Actualizar registro');
        });
    });

    $(document).on('click', '#home-tab', function() {
        $('#profile-tab').text('Nuevo Conductor');
        $('.btn-insertar').text('Crear nuevo Conductor');
        $('#editar-conductor').prop("id","crear-conductor");
        $('#crear-conductor')[0].reset();
    });
</script>

{{-- Script actualizar datos --}}
<script>
    $(document).on('submit',"#editar-conductor",function (e) {
        e.preventDefault();

        var _id = $('#idConductor').val();
        var _nro_auto = $('#nro_auto').val();
        var _name = $('#name').val();
        var _surname = $('#surname').val();
        var _dueno_auto = $('#dueno_auto').val();
        var _dni = $('#dni').val();
        var _nro_brevete = $('#nro_brevete').val();
        var _direccion = $('#direccion').val();
        var _fecha_ingreso = $('#fecha_ingreso').val();
        var _observaciones = $('#observaciones').val();
        var _token = $("input[name='_token']").val();

        $.ajax({
            type: "POST",
            url: "{{route('conductor.actualizar')}}",
            data: {
                id: _id,
                nro_auto: _nro_auto,
                name: _name,
                surname: _surname,
                dueno_auto: _dueno_auto,
                dni: _dni,
                nro_brevete: _nro_brevete,
                direccion: _direccion,
                fecha_ingreso: _fecha_ingreso,
                observaciones: _observaciones,
                _token: _token,
            },
            beforeSend: function() {
                $('.btn-insertar').text('Actualizando...');
            },
            success: function (response) {
                if (response) {
                    $('#editar-conductor')[0].reset();
                    toastr.info('El registro se actualizo correctamente.', 'Editar Registro',{timeOut: 3000});
                    $('#tabla').DataTable().ajax.reload();

                    $('.btn-insertar').text('Crear nuevo conductor');
                    $('#editar-conductor').prop("id","crear-conductor");
                    $('#profile-tab').text('Nuevo Conductor');
                }
            }
        });
    });
</script>

{{-- Script detalles de conductor --}}
<script>
    $(document).on('click', '.detail', function() {
        $('#detail-tab').show();
        $('#detail-tab').click();

        //Mostrar los detalles del taxi
    });
</script>
@endsection
