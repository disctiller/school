<x-layout>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-secondary"
                    onclick="window.location='{{ route('sedes.index') }}'">Regresar</button>
            </div>
        </div>
    </div>
    <h2>Grupos de la Sede: {{ $sede->nombre }}</h2>

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="POST" action="">
                    @csrf @method('PATCH')
                    <fieldset>
                        @foreach ($grupos as $grupo)
                            <div class="form-check">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $grupo->codigo }} - {{ $grupo->nombre }}
                                </label>
                            </div>
                        @endforeach
                        <button class="btn btn-primary mt-3" type="submit">Guardar</button>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>

</x-layout>