<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Nuevo consignee - SFA</title>
</head>

<body>

    <h1>Nuevo consignee</h1>

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
        action="{{ route('consignees.store') }}"
    >

        @csrf

        <label>
            Nombre del consignee
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
            Guardar consignee
        </button>

    </form>

    <br>

    <a href="{{ route('consignees.index') }}">
        ← Regresar
    </a>

</body>

</html>