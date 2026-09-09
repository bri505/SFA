<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Nueva compañía - SFA</title>

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;

            font-family: Arial, sans-serif;

            background: #f5f7fa;

            color: #1f2937;
        }

        .container {
            max-width: 900px;

            margin: 0 auto;

            padding: 30px;
        }

        /* HEADER */

        .header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;
        }

        .title {
            margin: 0;

            font-size: 25px;

            font-weight: 700;
        }

        .subtitle {
            margin-top: 6px;

            color: #6b7280;

            font-size: 14px;
        }

        .back {
            color: #4b5563;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;
        }

        .back:hover {
            color: #111827;
        }

        /* CARD */

        .card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 9px;

            overflow: hidden;
        }

        .card-header {
            padding: 20px 24px;

            border-bottom: 1px solid #e5e7eb;
        }

        .card-title {
            margin: 0;

            font-size: 16px;

            font-weight: 700;
        }

        .card-subtitle {
            margin-top: 5px;

            color: #6b7280;

            font-size: 13px;
        }

        /* ERRORES */

        .errors {
            margin: 20px 24px 0;

            padding: 12px 15px;

            background: #fef2f2;

            border: 1px solid #fecaca;

            border-radius: 7px;

            color: #b91c1c;

            font-size: 13px;
        }

        .errors ul {
            margin: 8px 0 0 18px;
        }

        /* FORMULARIO */

        .form {
            padding: 24px;
        }

        .grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 18px;
        }

        .group {
            display: flex;

            flex-direction: column;

            gap: 6px;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;

            font-weight: 600;

            color: #374151;
        }

        .required {
            color: #dc2626;
        }

        input {
            width: 100%;

            padding: 10px 12px;

            border: 1px solid #d1d5db;

            border-radius: 6px;

            font-size: 14px;

            outline: none;

            transition: .2s;
        }

        input:focus {
            border-color: #6b7280;

            box-shadow: 0 0 0 2px
                rgba(107, 114, 128, .12);
        }

        /* FOOTER */

        .footer {
            display: flex;

            justify-content: flex-end;

            gap: 10px;

            padding: 18px 24px;

            border-top: 1px solid #e5e7eb;

            background: #fafafa;
        }

        .btn {
            border: none;

            border-radius: 6px;

            padding: 10px 16px;

            font-size: 14px;

            font-weight: 600;

            cursor: pointer;

            text-decoration: none;
        }

        .btn-cancel {
            background: white;

            border: 1px solid #d1d5db;

            color: #374151;
        }

        .btn-save {
            background: #111827;

            color: white;
        }

        .btn-save:hover {
            background: #374151;
        }

        @media (max-width: 700px) {

            .container {
                padding: 20px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .header {
                align-items: flex-start;

                gap: 15px;
            }

        }

    </style>

</head>


<body>

<div class="container">


    {{-- HEADER --}}

    <div class="header">

        <div>

            <h1 class="title">
                Nueva compañía
            </h1>

            <div class="subtitle">
                Registra la información del cliente
            </div>

        </div>


        <a
            href="{{ route('companies.index') }}"
            class="back"
        >
            ← Regresar
        </a>

    </div>



    {{-- CARD --}}

    <div class="card">


        <div class="card-header">

            <h2 class="card-title">
                Información de la compañía
            </h2>

            <div class="card-subtitle">
                Completa los datos de contacto y ubicación.
            </div>

        </div>



        {{-- ERRORES --}}

        @if($errors->any())

            <div class="errors">

                <strong>
                    Corrige los siguientes errores:
                </strong>

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
            action="{{ route('companies.store') }}"
        >

            @csrf


            <div class="form">

                <div class="grid">


                    {{-- NOMBRE --}}

                    <div class="group full">

                        <label>
                            Nombre de la compañía
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Nombre de la compañía"
                            required
                        >

                    </div>


                    {{-- DIRECCIÓN --}}

                    <div class="group full">

                        <label>
                            Dirección
                        </label>

                        <input
                            type="text"
                            name="address"
                            value="{{ old('address') }}"
                            placeholder="Calle, número, colonia..."
                        >

                    </div>


                    {{-- CIUDAD --}}

                    <div class="group">

                        <label>
                            Ciudad
                        </label>

                        <input
                            type="text"
                            name="city"
                            value="{{ old('city') }}"
                            placeholder="Ciudad"
                        >

                    </div>


                    {{-- ESTADO --}}

                    <div class="group">

                        <label>
                            Estado
                        </label>

                        <input
                            type="text"
                            name="state"
                            value="{{ old('state') }}"
                            placeholder="Estado"
                        >

                    </div>


                    {{-- CÓDIGO POSTAL --}}

                    <div class="group">

                        <label>
                            Código postal
                        </label>

                        <input
                            type="text"
                            name="postal_code"
                            value="{{ old('postal_code') }}"
                            placeholder="Código postal"
                        >

                    </div>


                    {{-- TELÉFONO --}}

                    <div class="group">

                        <label>
                            Número de teléfono
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="Número de teléfono"
                        >

                    </div>


                    {{-- CONTACTO --}}

                    <div class="group">

                        <label>
                            Contacto
                        </label>

                        <input
                            type="text"
                            name="contact"
                            value="{{ old('contact') }}"
                            placeholder="Nombre del contacto"
                        >

                    </div>


                    {{-- CORREO --}}

                    <div class="group">

                        <label>
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="correo@empresa.com"
                        >

                    </div>


                </div>

            </div>



            {{-- FOOTER --}}

            <div class="footer">

                <a
                    href="{{ route('companies.index') }}"
                    class="btn btn-cancel"
                >
                    Cancelar
                </a>


                <button
                    type="submit"
                    class="btn btn-save"
                >
                    Guardar compañía
                </button>

            </div>


        </form>

    </div>

</div>

</body>

</html>