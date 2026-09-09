<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Nuevo broker - SFA</title>
</head>

<body>

    <h1>Nuevo broker</h1>

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
        action="{{ route('brokers.store') }}"
    >

        @csrf

        <label>
            Nombre del broker
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
            Guardar broker
        </button>

    </form>

    <br>

    <a href="{{ route('brokers.index') }}">
        ← Regresar
    </a>

</body>

</html>