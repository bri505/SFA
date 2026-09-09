<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Nuevo shipper - SFA</title>
</head>

<body>

    <h1>Nuevo shipper</h1>

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
        action="{{ route('shippers.store') }}"
    >

        @csrf

        <label>
            Nombre del shipper
        </label>

        <br>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >

        <br><br>

        <button type="submit">
            Guardar shipper
        </button>

    </form>

    <br>

    <a href="{{ route('shippers.index') }}">
        ← Regresar
    </a>

</body>

</html>