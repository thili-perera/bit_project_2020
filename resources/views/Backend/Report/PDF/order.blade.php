<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">Income Report </h1>
    {{-- @foreach ($date as $time) --}}
    {{-- <h3>{{ $time->toDateString()}}</h3>
    @endforeach --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Item Name</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $order)
                <tr>

                    <th scope="row">{{ $order->order_number }}</th>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>
                        @foreach ($order->products as $item)
                            <li>{{ $item->proname }}<br></li>
                        @endforeach
                    </td>
                    <td>Rs. {{ $order->grand_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
