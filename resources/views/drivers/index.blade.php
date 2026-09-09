<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Drivers - SFA</title>

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

    <h1>Drivers</h1>

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif

    <a href="{{ route('drivers.create') }}">
        + Nuevo conductor
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

            @forelse($drivers as $driver)

                <tr>

                    <td>
                        {{ $driver->id }}
                    </td>

                    <td>
                        {{ $driver->name }}
                    </td>

                    <td>

                        @if($driver->active)

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

                        <a href="{{ route('drivers.edit', $driver) }}">
                            Editar
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4">
                        No hay conductores registrados.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    <br>

    <a href="{{ route('companies.index') }}">
        ← Companies
    </a>

</body>

</html>