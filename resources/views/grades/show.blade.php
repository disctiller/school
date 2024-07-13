<x-layout>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('grades.index') }}'">Regresar</button>
          </div>
        </div>
      </div>
  <h2>Detalle del Grado</h2>
  <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center">Id</span>
                            <div class="col-md-8">
                                <input disabled id="id" name="id" type="text" placeholder="{{ $grade->id }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center">Número</span>
                            <div class="col-md-8">
                                <input disabled id="numero" name="numero" type="text" placeholder="{{ $grade->numero }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center">Nombre</span>
                            <div class="col-md-8">
                                <input disabled id="nombre" name="nombre" type="text" placeholder="{{ $grade->nombre }}" class="form-control">
                            </div>
                        </div>
                        
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

</x-layout>