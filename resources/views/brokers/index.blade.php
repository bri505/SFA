<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Brokers - SFA</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }

        .success {
            padding: 10px;
            background: #d4edda;
            margin-bottom: 15px;
        }

        .active {
            color: green;
            font-weight: bold;
        }

        .inactive {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Brokers</h1>

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif

    <a href="{{ route('brokers.create') }}">
        + Nuevo broker
    </a>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>

        </thead>

        <tbody>

            @forelse($brokers as $broker)

                <tr>

                    <td>
                        {{ $broker->id }}
                    </td>

                    <td>
                        {{ $broker->name }}
                    </td>

                    <td>

                        @if($broker->active)

                            <span class="active">
                                Activo
                            </span>

                        @else

                            <span class="inactive">
                                Inactivo
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('brokers.edit', $broker) }}">
                            Editar
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4">
                        No hay brokers registrados.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    <br>

    <a href="{{ route('trailers.index') }}">
        ← Trailers
    </a>

</body>

</html>