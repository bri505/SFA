<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Shippers - SFA</title>

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

    <h1>Shippers</h1>

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif

    <a href="{{ route('shippers.create') }}">
        + Nuevo shipper
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

            @forelse($shippers as $shipper)

                <tr>

                    <td>
                        {{ $shipper->id }}
                    </td>

                    <td>
                        {{ $shipper->name }}
                    </td>

                    <td>

                        @if($shipper->active)

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

                        <a href="{{ route('shippers.edit', $shipper) }}">
                            Editar
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4">
                        No hay shippers registrados.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    <br>

    <a href="{{ route('brokers.index') }}">
        ← Brokers
    </a>

</body>

</html>