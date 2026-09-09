<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Editar consignee - SFA</title>
</head>

<body>

    <h1>Editar consignee</h1>

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
        action="{{ route('consignees.update', $consignee) }}"
    >

        @csrf

        @method('PUT')

        <label>
            Nombre del consignee
        </label>

        <br>

        <input
            type="text"
            name="name"
            value="{{ old('name', $consignee->name) }}"
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
                {{ $consignee->active ? 'selected' : '' }}
            >
                Activo
            </option>

            <option
                value="0"
                {{ !$consignee->active ? 'selected' : '' }}
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

    <a href="{{ route('consignees.index') }}">
        ← Regresar
    </a>

</body>

</html>