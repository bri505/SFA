<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Editar shipper - SFA</title>
</head>

<body>

    <h1>Editar shipper</h1>

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
        action="{{ route('shippers.update', $shipper) }}"
    >

        @csrf

        @method('PUT')

        <label>
            Nombre del shipper
        </label>

        <br>

        <input
            type="text"
            name="name"
            value="{{ old('name', $shipper->name) }}"
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
                {{ $shipper->active ? 'selected' : '' }}
            >
                Activo
            </option>

            <option
                value="0"
                {{ !$shipper->active ? 'selected' : '' }}
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

    <a href="{{ route('shippers.index') }}">
        ← Regresar
    </a>

</body>

</html>