<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Record #{{ $record->id }}</title>

    <style>

        @page {
            margin: 25px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #1f2937;
        }

        h1 {
            font-size: 20px;
            margin: 0;
        }

        h2 {
            font-size: 12px;
            margin-top: 20px;
            margin-bottom: 8px;
            padding-bottom: 5px;
            border-bottom: 1px solid #d1d5db;
        }

        .header {
            margin-bottom: 20px;
        }

        .subtitle {
            color: #6b7280;
            font-size: 9px;
            margin-top: 4px;
        }

        .section {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            width: 25%;
            background: #f3f4f6;
            border: 1px solid #d1d5db;
            padding: 7px;
            text-align: left;
            font-size: 8px;
            color: #374151;
        }

        td {
            border: 1px solid #e5e7eb;
            padding: 7px;
            font-size: 9px;
        }

        .value {
            font-weight: bold;
        }

        .services th {
            width: auto;
            background: #f3f4f6;
        }

        .services td {
            font-size: 8px;
        }

        .text-right {
            text-align: right;
        }

        .notes {
            border: 1px solid #e5e7eb;
            padding: 10px;
            min-height: 40px;
            font-size: 9px;
        }

        .empty {
            color: #9ca3af;
        }

        .footer {
            margin-top: 25px;
            padding-top: 8px;
            border-top: 1px solid #e5e7eb;
            font-size: 7px;
            color: #9ca3af;
        }

    </style>

</head>


<body>


    {{-- HEADER --}}

    <div class="header">

        <h1>
            Record #{{ $record->id }}
        </h1>

        <div class="subtitle">
            American Invoice System — SFA
        </div>

    </div>



    {{-- RECORD INFORMATION --}}

    <div class="section">

        <h2>
            Record Information
        </h2>

        <table>

            <tr>

                <th>
                    Record
                </th>

                <td class="value">
                    #{{ $record->id }}
                </td>

                <th>
                    Date
                </th>

                <td>
                    {{ $record->date?->format('m/d/Y') ?? '—' }}
                </td>

            </tr>


            <tr>

                <th>
                    Invoice Number
                </th>

                <td>
                    {{ $record->invoice_number ?? '—' }}
                </td>

                <th>
                    PAPS
                </th>

                <td>
                    {{ $record->paps_number ?? '—' }}
                </td>

            </tr>


            <tr>

                <th>
                    Origin
                </th>

                <td>
                    {{ $record->origin ?? '—' }}
                </td>

                <th>
                    Destination
                </th>

                <td>
                    {{ $record->destination ?? '—' }}
                </td>

            </tr>


            <tr>

                <th>
                    Quantity
                </th>

                <td colspan="3">

                    @if($record->quantity !== null)

                        {{ $record->quantity }}

                        @if($record->quantity_type === 'palets')
                            Pallets
                        @elseif($record->quantity_type === 'contenedores')
                            Containers
                        @elseif($record->quantity_type === 'piezas')
                            Pieces
                        @else
                            {{ $record->quantity_type ?? '' }}
                        @endif

                    @else

                        —

                    @endif

                </td>

            </tr>

        </table>

    </div>



    {{-- TRANSPORTATION AND PARTICIPANTS --}}

    <div class="section">

        <h2>
            Transportation and Participants
        </h2>

        <table>

            <tr>

                <th>
                    Client
                </th>

                <td>
                    {{ $record->company?->name ?? '—' }}
                </td>

                <th>
                    Driver
                </th>

                <td>
                    {{ $record->driver?->name ?? '—' }}
                </td>

            </tr>


            <tr>

                <th>
                    Trailer
                </th>

                <td>
                    {{ $record->trailer?->number ?? '—' }}
                </td>

                <th>
                    Shipper
                </th>

                <td>
                    {{ $record->shipper?->name ?? '—' }}
                </td>

            </tr>


            <tr>

                <th>
                    Consignee
                </th>

                <td>
                    {{ $record->consignee?->name ?? '—' }}
                </td>

                <th>
                    Broker
                </th>

                <td>
                    {{ $record->broker?->name ?? '—' }}
                </td>

            </tr>

        </table>

    </div>



    {{-- SERVICES --}}

    <div class="section">

        <h2>
            Services
        </h2>

        @if($record->services && $record->services->count())

            <table class="services">

                <thead>

                    <tr>

                        <th>
                            Service
                        </th>

                        <th>
                            Quantity
                        </th>

                        <th>
                            Price
                        </th>

                        <th>
                            Subtotal
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($record->services as $service)

                        <tr>

                            <td>
                                {{ $service->serviceType?->name ?? '—' }}
                            </td>

                            <td>
                                {{ $service->quantity ?? 1 }}
                            </td>

                            <td class="text-right">

                                ${{ number_format($service->price ?? 0, 2) }}

                            </td>

                            <td class="text-right">

                                ${{ number_format(
                                    ($service->quantity ?? 1) * ($service->price ?? 0),
                                    2
                                ) }}

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">
                No services registered.
            </div>

        @endif

    </div>



    {{-- NOTES --}}

    <div class="section">

        <h2>
            Notes
        </h2>

        <div class="notes">

            @if($record->notes)

                {{ $record->notes }}

            @else

                <span class="empty">
                    No notes.
                </span>

            @endif

        </div>

    </div>



    {{-- REGISTERED BY --}}

    <div class="section">

        <h2>
            Record and Tracking
        </h2>

        <table>

            <tr>

                <th>
                    Registered By
                </th>

                <td>
                    {{ $record->registeredBy?->name ?? '—' }}
                </td>

            </tr>

        </table>

    </div>



    {{-- FOOTER --}}

    <div class="footer">

        American Invoice System — SFA

        <br>

        Record #{{ $record->id }}

        ·

        Generated on {{ now()->format('m/d/Y H:i') }}

    </div>


</body>

</html>