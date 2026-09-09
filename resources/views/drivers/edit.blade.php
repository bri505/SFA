<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Editar conductor - SFA</title>
</head>

<body>

    <h1>Editar conductor</h1>

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
        action="{{ route('drivers.update', $driver) }}"
    >

        @csrf

        @method('PUT')

        <label>
            Nombre del conductor
        </label>

        <br>

        <input
            type="text"
            name="name"
            value="{{ old('name', $driver->name) }}"
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
                {{ $driver->active ? 'selected' : '' }}
            >
                Activo
            </option>

            <option
                value="0"
                {{ !$driver->active ? 'selected' : '' }}
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

    <a href="{{ route('drivers.index') }}">
        ← Regresar
    </a>

</body>

</html>