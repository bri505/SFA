<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>
        {{ $emailSubject }}
    </title>
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
        {{ $emailMessage }}
    </p>


    <p>
        <strong>Facturas incluidas:</strong>
    </p>


    <ul>

        @foreach($invoices as $invoice)

            <li>
                Factura
                <strong>
                    {{ is_object($invoice)
                        ? $invoice->invoice_number
                        : ($invoice['invoice_number'] ?? '') }}
                </strong>
            </li>

        @endforeach

    </ul>


    <p>
        Los documentos correspondientes a las facturas
        indicadas se encuentran adjuntos a este correo.
    </p>


    <p>
        Si tiene alguna duda respecto a alguno de los documentos,
        puede comunicarse con nosotros.
    </p>


    <p>
        Saludos,<br>
        Sistema SFA
    </p>

</body>

</html>