<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Código de acceso - SFA</title>
</head>

<body
    style="
        margin: 0;
        padding: 0;
        background: #f5f6f8;
        font-family: Arial, Helvetica, sans-serif;
        color: #1f2937;
    "
>

    <div
        style="
            width: 100%;
            padding: 40px 16px;
            box-sizing: border-box;
        "
    >

        <div
            style="
                max-width: 480px;
                margin: 0 auto;
                background: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 32px;
                box-sizing: border-box;
            "
        >

            <div
                style="
                    text-align: center;
                    margin-bottom: 28px;
                "
            >
                <div
                    style="
                        font-size: 28px;
                        font-weight: 700;
                        letter-spacing: -0.5px;
                        color: #1f2937;
                    "
                >
                    SFA
                </div>

                <div
                    style="
                        margin-top: 5px;
                        font-size: 11px;
                        color: #9ca3af;
                    "
                >
                    Sistema para Facturas Americanas
                </div>
            </div>

            <div
                style="
                    font-size: 16px;
                    font-weight: 600;
                    margin-bottom: 10px;
                "
            >
                Código de acceso
            </div>

            <div
                style="
                    font-size: 13px;
                    line-height: 1.6;
                    color: #6b7280;
                    margin-bottom: 24px;
                "
            >
                Utiliza el siguiente código para iniciar sesión en SFA:
            </div>

            <div
                style="
                    text-align: center;
                    margin: 24px 0;
                "
            >
                <div
                    style="
                        display: inline-block;
                        padding: 14px 24px;
                        background: #f5f6f8;
                        border: 1px solid #e5e7eb;
                        border-radius: 6px;
                        font-size: 28px;
                        font-weight: 700;
                        letter-spacing: 8px;
                        color: #1f2937;
                    "
                >
                    {{ $code }}
                </div>
            </div>

            <div
                style="
                    font-size: 12px;
                    line-height: 1.6;
                    color: #6b7280;
                    margin-top: 24px;
                "
            >
                Este código es válido durante
                <strong>10 minutos</strong>.
            </div>

            <div
                style="
                    font-size: 12px;
                    line-height: 1.6;
                    color: #6b7280;
                    margin-top: 8px;
                "
            >
                Si tú no solicitaste este código, puedes ignorar este
                mensaje.
            </div>

            <div
                style="
                    border-top: 1px solid #e5e7eb;
                    margin-top: 28px;
                    padding-top: 18px;
                    text-align: center;
                    font-size: 10px;
                    color: #9ca3af;
                "
            >
                SFA · Sistema administrativo
            </div>

        </div>

    </div>

</body>
</html>
