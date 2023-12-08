<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoices PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .form-group {
            display: flex;
            flex-direction: row;
            margin: 10px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>

    <div class="container">
        @foreach ($uniqueOrder as $order)
        <h1>Invoice</h1>
        <form>
            <div style="display: flex; flex-direction: column;">
                <div class="form-group">
                    <label for="id">Order Number:</label>
                    <p>{{ $order->order_number }}</p>
                </div>
                <div class="form-group">
                    <label for="name">Customer Name:</label>
                    <p>{{ $order->customer_name }}</p>
                </div>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Free</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allOrders as $item)
                        @if($item->order_number === $order->order_number)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_code }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->free }}</td>
                            <td>{{ $item->amount }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <p>Net Amount: {{ $order->net_amount }}.00</p>
            </div>
            @if(!$loop->last)
            <div class="page-break"></div>
            @endif
        </form>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Add any necessary scripts here if needed
    </script>
</body>
</html>
