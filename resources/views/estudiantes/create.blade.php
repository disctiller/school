<x-layout>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-secondary"
                    onclick="window.location='{{ route('estudiantes.index') }}'">Regresar</button>
            </div>
        </div>
    </div>
    <h2>Registro de Estudiante</h2>

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm mb-3">
                <form method="POST" action="{{ route('estudiantes.store') }}">
                    @csrf
                    <fieldset>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Número de Documento</span>
                            <div class="col-md-8">
                                <input id="numero_documento" type="text"
                                    class="form-control @error('numero_documento') is-invalid @enderror"
                                    name="numero_documento" value="{{ old('numero_documento') }}" required
                                    autocomplete="numero_documento" autofocus>
                            </div>
                            @error('numero_documento')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Primer Nombre</span>
                            <div class="col-md-8">
                                <input id="nombre1" type="text"
                                    class="form-control @error('nombre1') is-invalid @enderror" name="nombre1"
                                    value="{{ old('nombre1') }}" required autocomplete="nombre1" autofocus>
                            </div>
                            @error('nombre1')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Segundo Nombre</span>
                            <div class="col-md-8">
                                <input id="nombre2" type="text"
                                    class="form-control @error('nombre2') is-invalid @enderror" name="nombre2"
                                    value="{{ old('nombre2') }}" required autocomplete="nombre2" autofocus>
                            </div>
                            @error('nombre2')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Primer Apellido</span>
                            <div class="col-md-8">
                                <input id="apellido1" type="text"
                                    class="form-control @error('apellido1') is-invalid @enderror" name="apellido1"
                                    value="{{ old('apellido1') }}" required autocomplete="apellido1" autofocus>
                            </div>
                            @error('apellido1')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Segundo Apellido</span>
                            <div class="col-md-8">
                                <input id="apellido2" type="text"
                                    class="form-control @error('apellido2') is-invalid @enderror" name="apellido2"
                                    value="{{ old('apellido2') }}" required autocomplete="apellido2" autofocus>
                            </div>
                            @error('apellido2')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Correo Electrónico</span>
                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Institución Educativa</span>
                            <div class="col-md-8">
                                <select name="institucion_id" id="institucion_id" class="form-control custom-select">
                                    <option value="">Seleccion la Institución</option>
                                    @foreach($instituciones as $institucion)
                                        <option value="{{ $institucion->id }}">{{ $institucion->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('institucion_id')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Sede</span>
                            <div class="col-md-8">
                                <select name="sede_id" id="sede_id" class="form-control custom-select">
                                    <option value="">Seleccion la Sede</option>
                                </select>
                            </div>
                            @error('sede_id')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Grado</span>
                            <div class="col-md-8">
                                <select name="grado_id" id="grado_id" class="form-control custom-select">
                                    <option value="">Seleccione el Grado</option>
                                </select>
                            </div>
                            @error('sede_id')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Grupo</span>
                            <div class="col-md-8">
                                <select name="grupo_id" id="grupo_id" class="form-control custom-select">
                                    <option value="">Seleccione el Grupo</option>
                                </select>
                            </div>
                            @error('grupo_id')
                                <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>

                        <button class="btn btn-primary mt-3" type="submit">Guardar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#institucion_id").change(function () {
            if ($("#institucion_id").val() != '') {
                $.ajax({
                    url: '/sedesbyinstitucion/' + $("#institucion_id").val(),
                    type: 'get',
                    dataType: 'json',
                    beforeSend: function () { },
                    success: function (response) {
                        var html = "";
                        html += '<option value="">Seleccione la Sede</option>';
                        $.each(response, function (index, value) {
                            html += '<option value="' + value.id + '">' + value.nombre + "</option>";
                        });
                        $("#sede_id").html(html);
                    },
                    error: function () {
                        alert("error")
                    }
                });
            }
        })

        $("#sede_id").change(function () {
            if ($("#sede_id").val() != '') {
                $.ajax({
                    url: '/gradosbysede/' + $("#sede_id").val(),
                    type: 'get',
                    dataType: 'json',
                    beforeSend: function () { },
                    success: function (response) {
                        var html = "";
                        html += '<option value="">Seleccione el Grado</option>';
                        $.each(response, function (index, value) {
                            html += '<option value="' + value.id + '">' + value.nombre + "</option>";
                        });
                        $("#grado_id").html(html);
                    },
                    error: function () {
                        alert("error")
                    }
                });
            }
        })

        $("#grado_id").change(function () {
            if ($("#grado_id").val() != '') {
                $.ajax({
                    url: '/gruposbygrado/' + $("#sede_id").val() + '/' + $("#grado_id").val(),
                    type: 'get',
                    dataType: 'json',
                    beforeSend: function () { },
                    success: function (response) {
                        var html = "";
                        html += '<option value="">Seleccione el Grupo</option>';
                        $.each(response, function (index, value) {
                            html += '<option value="' + value.id + '">' + value.codigo + ' - ' + value.nombre + "</option>";
                        });
                        $("#grupo_id").html(html);
                    },
                    error: function () {
                        alert("error")
                    }
                });
            }
        })

    </script>
</x-layout>