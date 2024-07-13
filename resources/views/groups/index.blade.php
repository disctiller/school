<x-layout>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <span></span>
    @session('status')
    <div class="alert alert-success col-10">
      {{ $value }}
    </div>
  @endsession

    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-success"
          onclick="window.location='{{ route('groups.create') }}'">Nuevo</button>
      </div>
    </div>
  </div>
  <h2>Grupos</h2>
  <div class="table-responsive">
    <table id="groupstable" class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Grupo</th>
          <th scope="col">Grado</th>
          <th scope="col">Detalle</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($groups as $group)
      <tr>
        <td>{{ $group->id }}</td>
        <td>{{ $group->nombre }}</td>
        <td>{{ $group->id_grado }}</td>
        <td>
        <h6 style=""><a href="{{ route('groups.show', $group->id) }}"><span data-feather="search"></span></a></h6>
        </td>
        <td><a href="{{ route('groups.edit', $group->id) }}"><span data-feather="edit"></span></a></td>
        <td><a class="btn btn-link" data-bs-toggle="modal" data-bs-target="#deletemodal{{$group->id}}">
          <span data-feather="delete"></span>
        </a>
        </td>
        <!-- Modal -->
        <div class="modal fade" id="deletemodal{{$group->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticdeletemodalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Eliminar Grupo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Seguro desea eliminar el Grupo?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
            <a class="btn btn-primary" href="{{ route('groups.delete', $group->id) }}">Eliminar</a>
          </div>
          </div>
        </div>
        </div>
      </tr>
    @endforeach
      </tbody>
    </table>
  </div>
</x-layout>