<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Nuevo conductor - SFA</title>
</head>

<body>

    <h1>Nuevo conductor</h1>

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
        action="{{ route('drivers.store') }}"
    >

        @csrf

        <label>
            Nombre del conductor
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
            Guardar conductor
        </button>

    </form>

    <br>

    <a href="{{ route('drivers.index') }}">
        ← Regresar
    </a>

</body>

</html>