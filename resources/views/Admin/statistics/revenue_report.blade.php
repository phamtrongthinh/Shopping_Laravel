<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Revenue Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Revenue Report</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Orders</th>
                <th>Total Revenue (VND)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($revenues as $row)
                <tr>
                    <td>{{ $row->date }}</td>
                    <td>{{ $row->total_orders }}</td>
                    <td>{{ number_format($row->total_revenue) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
