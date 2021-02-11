@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Lista de clientes</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Nuevo Cliente</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <br>
            <table id="tabla" class="table table-hover">
                <thead>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Nombre de la empresa</td>
                    <td>Direccion</td>
                    <td>Observaciones</td>
                    <td>Acciones</td>
                </thead>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            <form id="crear-cliente">
                @csrf
                <input type="hidden" id="idCliente" name="id">

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
                    <label for="name_empresa" class="col-md-4 col-form-label text-md-right">Nombre de la empresa</label>

                    <div class="col-md-6">
                        <input id="name_empresa" type="text" class="form-control @error('name_empresa') is-invalid @enderror" name="name_empresa" value="{{ old('name_empresa') }}" autocomplete="name_empresa" autofocus>

                        @error('name_empresa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>

                    <div class="col-md-6">
                        <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>

                        @error('direccion')
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
                            Crear nuevo cliente
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- MODALES --}}
    <!-- Modal Eliminar -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
            var tablaClientes = $('#tabla').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('cliente.index') }}"
                },
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'surname'},
                    {data: 'name_empresa'},
                    {data: 'direccion'},
                    {data: 'observaciones'},
                    {data: 'action', orderable: false}
                ]
            });
        });

    </script>

    {{-- Script guardar datos --}}
    <script>
        $(document).on('submit',"#crear-cliente",function (e) {
            e.preventDefault();

            var _name = $('#name').val();
            var _surname = $('#surname').val();
            var _name_empresa = $('#name_empresa').val();
            var _direccion = $('#direccion').val();
            var _observaciones = $('#observaciones').val();
            var _token = $("input[name='_token']").val();

            $.ajax({
                type: "POST",
                url: "{{ route('cliente.insertar') }}",
                data: {
                    name: _name,
                    surname: _surname,
                    name_empresa: _name_empresa,
                    direccion: _direccion,
                    observaciones: _observaciones,
                    _token: _token,
                },
                beforeSend: function() {
                    $('.btn-insertar').text('Insertando...');
                },
                success: function(response) {
                    if (response) {
                        $('#crear-cliente')[0].reset();
                        toastr.success('El cliente se inserto correctamente.', 'Nuevo Registro',{timeOut: 3000});
                        $('#tabla').DataTable().ajax.reload();

                        $('.btn-insertar').text('Crear nuevo cliente');
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
            _url = "{{ route('cliente.eliminar') }}/" + _id;
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
            let _url = "{{ route('cliente.editar') }}/" + _id;

            $.get(_url, function(cliente) {

                $('#idCliente').val(cliente.id);
                $('#name').val(cliente.name);
                $('#surname').val(cliente.surname);
                $('#name_empresa').val(cliente.name_empresa);
                $('#direccion').val(cliente.direccion);
                $('#observaciones').val(cliente.observaciones);

                $('input[name=_token]').val();
                $('#profile-tab').click();
                $('#profile-tab').text('Editar Cliente');

                $('#crear-cliente').prop("id","editar-cliente");
                $('.btn-insertar').text('Actualizar registro');
            });
        });

        $(document).on('click', '#home-tab', function() {
            $('#profile-tab').text('Nuevo Cliente');
            $('.btn-insertar').text('Crear nuevo cliente');
            $('#editar-cliente').prop("id","crear-cliente");
            $('#crear-cliente')[0].reset();
        });
    </script>

    {{-- Script actualizar datos --}}
    <script>
        $(document).on('submit',"#editar-cliente",function (e) {
            e.preventDefault();

            var _id = $('#idCliente').val();
            var _name = $('#name').val();
            var _surname = $('#surname').val();
            var _name_empresa = $('#name_empresa').val();
            var _direccion = $('#direccion').val();
            var _observaciones = $('#observaciones').val();
            var _token = $("input[name='_token']").val();

            $.ajax({
                type: "POST",
                url: "{{route('cliente.actualizar')}}",
                data: {
                    id: _id,
                    name: _name,
                    surname: _surname,
                    name_empresa: _name_empresa,
                    direccion: _direccion,
                    observaciones: _observaciones,
                    _token: _token,
                },
                beforeSend: function() {
                    $('.btn-insertar').text('Actualizando...');
                },
                success: function (response) {
                    if (response) {
                        $('#editar-cliente')[0].reset();
                        toastr.info('El registro se actualizo correctamente.', 'Editar Registro',{timeOut: 3000});
                        $('#tabla').DataTable().ajax.reload();

                        $('.btn-insertar').text('Crear nuevo cliente');
                        $('#editar-cliente').prop("id","crear-cliente");
                        $('#profile-tab').text('Nuevo Cliente');
                    }
                }
            });
        });
    </script>
@endsection

