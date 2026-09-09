<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Editar broker - SFA</title>
</head>

<body>

    <h1>Editar broker</h1>

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
        action="{{ route('brokers.update', $broker) }}"
    >

        @csrf

        @method('PUT')

        <label>
            Nombre del broker
        </label>

        <br>

        <input
            type="text"
            name="name"
            value="{{ old('name', $broker->name) }}"
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
                {{ $broker->active ? 'selected' : '' }}
            >
                Activo
            </option>

            <option
                value="0"
                {{ !$broker->active ? 'selected' : '' }}
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

    <a href="{{ route('brokers.index') }}">
        ← Regresar
    </a>

</body>

</html>