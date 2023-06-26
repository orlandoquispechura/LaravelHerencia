@extends('welcome')

@section('principal')
    <div class="card mt-5">
        <div class="card-header">
            <h1>Crear persona</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.personas.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="nombre" class="form-label">Ingrese Nombre</label>
                    <input type="text" name="nombre" class="form-control" autofocus>
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="from-label">
                        Tipo de persona
                    </label>
                    <select name="tipo_persona" id="tipo_persona" class="form-control">
                        <option value="natural">Natural</option>
                        <option value="juridica">Jurídica</option>
                    </select>
                </div>
                <div class="form-group mb-3" id="input_persona_natural" style="display: block">
                    <label for="dni" class="form-label">Ingrese DNI</label>
                    <input type="text" name="dni" id="dni" class="form-control" autofocus>
                </div>
                <div class="form-group mb-3" id="input_persona_juridica" style="display: none">
                    <label for="nit" class="form-label">Ingrese NIT</label>
                    <input type="text" name="nit" id="nit" class="form-control" autofocus>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" value="Registrar" class="btn btn-success">
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
            if (this.value == 'natural') {
                camporPersonaNatural.style.display = 'block';
                campoPersonaJuridica.style.display = 'none';
            } else if (this.value === 'juridica') {
                camporPersonaNatural.style.display = 'none';
                campoPersonaJuridica.style.display = 'block';
            }
        })
    </script>
@endsection
