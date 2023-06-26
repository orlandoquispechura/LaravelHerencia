@extends('welcome')

@section('principal')
    <div class="card mt-5">
        <div class="card-header">
            <h1>Detalle de: {{ ucfirst($persona->nombre) }}</h1>
        </div>
        <div class="card-body">
            <p>Nombre: {{ Str::upper($persona->nombre) }}</p>
            @if ($persona->personaNatural)
                <p>DNI: {{ $persona->personaNatural->dni }}</p>
            @else
                <p>NIT: {{ $persona->personaJuridica->nit }}</p>
            @endif
            <a href="{{ route('admin.personas.index') }}" class="btn btn-secondary"> Regresar</a>
        </div>
    </div>
@endsection

@section('js')
@endsection
