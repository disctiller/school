<x-layout>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-secondary"
                    onclick="window.location='{{ route('sedes.mostrargrados', $sede->id) }}'">Regresar</button>
            </div>
        </div>
    </div>
    <h4>Grupos: {{ $sede->institucion->nombre }} - {{ $sede->nombre }} - Grado {{ $grado->nombre }}</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="POST" action="{{ route('grupos.guardargrupos', $sede_grado->id)}}">
                    @csrf @method('PATCH')
                    <fieldset>
                        @foreach ($grupos as $grupo)
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="grado_grupos[]"
                                    value="{{ $grupo->id }}" id="{{ $grupo->id }}"
                                    @if ($grado_grupo)
                                    @foreach ($grado_grupo as $grad_grup)
                                    @if ($grupo->id == $grad_grup->grupo_id)
                                    checked
                                    @endif
                                    @endforeach
                                    @endif
                                    >
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