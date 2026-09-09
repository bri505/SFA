<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>SFA Report</title>

    <style>

        @page {
            margin: 25px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
            color: #1f2937;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 4px;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 18px;
        }

        .summary {
            margin-bottom: 15px;
        }

        .summary-box {
            display: inline-block;
            width: 30%;
            padding: 8px;
            border: 1px solid #d1d5db;
            margin-right: 8px;
        }

        .summary-label {
            font-size: 8px;
            color: #6b7280;
        }

        .summary-value {
            font-size: 14px;
            font-weight: bold;
            margin-top: 3px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f3f4f6;
            border: 1px solid #d1d5db;
            padding: 6px;
            text-align: left;
            font-size: 7px;
        }

        td {
            border: 1px solid #e5e7eb;
            padding: 5px;
            font-size: 7px;
        }

        .id {
            font-weight: bold;
        }

        .quantity {
            font-weight: bold;
        }

        .footer {
            margin-top: 15px;
            font-size: 7px;
            color: #9ca3af;
        }

    </style>

</head>

<body>

    <h1>SFA Records Report</h1>

    <div class="subtitle">
        Report generated on {{ now()->format('m/d/Y H:i') }}
    </div>


    <div class="summary">

        <div class="summary-box">

            <div class="summary-label">
                RECORDS
            </div>

            <div class="summary-value">
                {{ number_format($totalRecords) }}
            </div>

        </div>


        <div class="summary-box">

            <div class="summary-label">
                TOTAL QUANTITY
            </div>

            <div class="summary-value">
                {{ number_format($totalQuantity, 2) }}
            </div>

        </div>


        <div class="summary-box">

            <div class="summary-label">
                SERVICES
            </div>

            <div class="summary-value">
                {{ number_format($totalServices) }}
            </div>

        </div>

    </div>


    <table>

        <thead>

            <tr>

                <th>RECORD</th>
                <th>DATE</th>
                <th>CLIENT</th>
                <th>INVOICE NUMBER</th>
                <th>PAPS</th>
                <th>DRIVER</th>
                <th>TRAILER</th>
                <th>SHIPPER</th>
                <th>CONSIGNEE</th>
                <th>BROKER</th>
                <th>ORIGIN</th>
                <th>DESTINATION</th>
                <th>QUANTITY</th>

            </tr>

        </thead>


        <tbody>

            @forelse($records as $record)

                <tr>

                    <td class="id">
                        #{{ $record->id }}
                    </td>

                    <td>
                        {{ $record->date?->format('m/d/Y') ?? '—' }}
                    </td>

                    <td>
                        {{ $record->company?->name ?? '—' }}
                    </td>

                    <td>
                        {{ $record->invoice_number ?? '—' }}
                    </td>

                    <td>
                        {{ $record->paps_number ?? '—' }}
                    </td>

                    <td>
                        {{ $record->driver?->name ?? '—' }}
                    </td>

                    <td>
                        {{ $record->trailer?->number ?? '—' }}
                    </td>

                    <td>
                        {{ $record->shipper?->name ?? '—' }}
                    </td>

                    <td>
                        {{ $record->consignee?->name ?? '—' }}
                    </td>

                    <td>
                        {{ $record->broker?->name ?? '—' }}
                    </td>

                    <td>
                        {{ $record->origin ?? '—' }}
                    </td>

                    <td>
                        {{ $record->destination ?? '—' }}
                    </td>

                    <td class="quantity">

                        @if($record->quantity !== null)

                            {{ $record->quantity }}

                            @if($record->quantity_type === 'palets')
                                Pallets
                            @elseif($record->quantity_type === 'contenedores')
                                Containers
                            @elseif($record->quantity_type === 'piezas')
                                Pieces
                            @else
                                {{ $record->quantity_type }}
                            @endif

                        @else

                            —

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="13">
                        No records to display.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    <div class="footer">

        American Invoice System — SFA

    </div>

</body>

</html>