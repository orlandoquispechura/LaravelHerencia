@extends('welcome')

@section('principal')
    <div class="card mt-5">
        <div class="card-header">
            <h1>Modificar persona</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.personas.update', $persona->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nombre" class="form-label">Ingrese Nombre</label>
                    <input type="text" name="nombre" class="form-control" autofocus value="{{ $persona->nombre }}">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="from-label">
                        Tipo de persona
                    </label>
                    <select name="tipo_persona" id="tipo_persona" class="form-control">
                        <option value="natural" {{ $persona->personaNatural ? 'selected' : '' }}>Natural</option>
                        <option value="juridica" {{ $persona->personaJuridica ? 'selected' : '' }}>Jurídica</option>
                    </select>
                </div>

                <div class="form-group mb-3" {{ $persona->personaNatural ? '' : ' style=display:none;' }}
                    id="input_persona_natural">
                    <label for="dni" class="form-label">Ingrese DNI</label>
                    <input type="text" value="{{ $persona->personaNatural ? $persona->personaNatural->dni : '' }}"
                        name="dni" id="dni" class="form-control">
                </div>
                <div class="form-group mb-3" {{ $persona->personaJuridica ? '' : ' style=display:none;' }}
                    id="input_persona_juridica">
                    <label for="nit" class="form-label">Ingrese NIT</label>
                    <input type="text" value="{{ $persona->personaJuridica ? $persona->personaJuridica->nit : '' }}"
                        name="nit" id="nit" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input type="submit" value="Registrar" class="btn btn-success">
                    <a href="{{ route('admin.personas.index') }}" class="btn btn-secondary"> Regresar</a>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('tipo_persona').addEventListener('change', function() {
            let camporPersonaNatural = document.getElementById('input_persona_natural');
            let campoPersonaJuridica = document.getElementById('input_persona_juridica');
            if (this.value === 'natural') {
                camporPersonaNatural.style.display = 'block';
                campoPersonaJuridica.style.display = 'none';
            } else if (this.value === 'juridica') {
                camporPersonaNatural.style.display = 'none';
                campoPersonaJuridica.style.display = 'block';
            }
        })
    </script>
@endsection
