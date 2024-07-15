<x-layout>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('instituciones.index') }}'">Regresar</button>
          </div>
        </div>
      </div>
  <h2>Registro de Instituciones</h2>

  <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="POST" action="{{ route('instituciones.store')}}">
                    @csrf  
                <fieldset>
                        <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center">Nombre de la Institución</span>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" placeholder="Ingrese Nombre" class="form-control" required>
                            </div>
                            @error('nombre')
                            <small style="color:red"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center">Código Dane</span>
                            <div class="col-md-8">
                                <input id="dane" name="dane" type="text" value="{{ old('dane') }}" placeholder="Ingrese el código dane" class="form-control" required>
                            </div>
                            @error('dane')
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