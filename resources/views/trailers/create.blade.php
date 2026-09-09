<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Nuevo trailer - SFA</title>
</head>

<body>

    <h1>Nuevo trailer</h1>

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
        action="{{ route('trailers.store') }}"
    >

        @csrf

        <label>
            Número del trailer
        </label>

        <br>

        <input
            type="text"
            name="number"
            value="{{ old('number') }}"
            required
        >

        <br><br>

        <button type="submit">
            Guardar trailer
        </button>

    </form>

    <br>

    <a href="{{ route('trailers.index') }}">
        ← Regresar
    </a>

</body>

</html>