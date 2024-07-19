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
    <h2>Grados de: {{ $sede->nombre }}</h2>

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="POST" action="{{ route('sedes.guardargrados', $sede)}}">
                    @csrf @method('PATCH')
                    <fieldset>
                        @foreach ($grados as $grado)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="grados_sedes[]"
                                    value="{{ $grado->id }}" id="{{ $grado->id }}"
                                    @if ($sede->grados)
                                    @foreach ($sede->grados as $sedegrado)
                                    @if ($grado->id == $sedegrado->id)
                                    checked
                                    @endif
                                    @endforeach
                                    @endif
                                    >
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $grado->codigo }} - {{ $grado->nombre }}
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