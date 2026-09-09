<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Editar trailer - SFA</title>
</head>

<body>

    <h1>Editar trailer</h1>

    @if($errors->any())

        <div>

            <strong>Corrige los siguientes errores:</strong>

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif

    <form
        method="POST"
        action="{{ route('trailers.update', $trailer) }}"
    >

        @csrf

        @method('PUT')

        <label>
            Número del trailer
        </label>

        <br>

        <input
            type="text"
            name="number"
            value="{{ old('number', $trailer->number) }}"
            required
        >

        <br><br>

        <label>
            Estado
        </label>

        <br>

        <select name="active">

            <option
                value="1"
                {{ $trailer->active ? 'selected' : '' }}
            >
                Activo
            </option>

            <option
                value="0"
                {{ !$trailer->active ? 'selected' : '' }}
            >
                Inactivo
            </option>

        </select>

        <br><br>

        <button type="submit">
            Guardar cambios
        </button>

    </form>

    <br>

    <a href="{{ route('trailers.index') }}">
        ← Regresar
    </a>

</body>

</html>