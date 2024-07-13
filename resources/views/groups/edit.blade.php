<x-layout>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('groups.index') }}'">Regresar</button>
          </div>
        </div>
      </div>
  <h2>Editar Grupo</h2>

  <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="POST" action="{{ route('groups.update', $group)}}">
                    @csrf @method('PATCH')
                <fieldset>
                        <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center">Grupo</span>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $group->nombre) }}" placeholder="Ingrese Nombre" class="form-control" required>
                            </div>
                            @error('nombre')
                            <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center">Grado</span>
                            <div class="col-md-8">
                                <input id="id_grado" name="id_grado" type="text" value="{{ old('id_grado', $group->id_grado) }}" placeholder="Seleccione Grado" class="form-control" required>
                            </div>
                            @error('id_grado')
                            <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>
                        <button class="btn btn-primary mt-1" type="submit">Guardar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

</x-layout>