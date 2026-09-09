<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura {{ $invoiceNumber }}</title>
</head>

<body
    style="
        font-family: Arial, sans-serif;
        color: #374151;
        line-height: 1.6;
    "
>

    <h2>
        SFA
    </h2>

    <p>
        Se ha generado una nueva factura.
    </p>

    <p>
        <strong>Factura:</strong>
        {{ $invoiceNumber }}
    </p>

    <p>
        Los documentos correspondientes se encuentran adjuntos
        a este correo.
    </p>

    <p>
        Saludos,<br>
        Sistema SFA
    </p>

</body>

</html>