@extends('welcome')

@section('principal')
    @if (session('success'))
        <div class="mt-5 alert bg-success text-white">{{ session('success') }}</div>
    @endif
    <div class="card mt-5">
        <div>
            <a href=" {{ route('admin.personas.create') }} " class="btn btn-info">Nuevo</a>

        </div>
        <div class="card-header">
            <h1>Lista de personas</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped table-inverse table-responsive table-shadown">
                <thead class="table-dark ">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>TIPO</th>
                        <th>DNI/NIT</th>
                        <th width="250">GESTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personas as $persona)
                        <tr>
                            <td scope="row">{{ $persona->id }}</td>
                            <td scope="row">{{ Str::ucfirst($persona->nombre) }}</td>
                            <td>{{ $persona->personaNatural ? 'Natural' : 'Jurídica' }}</td>
                            <td>{{ $persona->personaNatural ? $persona->personaNatural->dni : $persona->personaJuridica->nit }}
                            </td>
                            <td>
                                <a href=" {{ route('admin.personas.show', $persona->id) }}" class="btn btn-info">Show</a>
                                <a href=" {{ route('admin.personas.edit', $persona->id) }}"
                                    class="btn btn-primary">Editar</a>
                                <form class="d-inline" action="{{ route('admin.personas.destroy', $persona->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Esta seguro de eliminar el registro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">{{ $personas->links() }}</div>
        </div>
    </div>
@endsection
