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
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0
            @endphp
            @foreach ($data as $order)
            @php
            $total += $order->grand_total
            @endphp
            <tr>
                <th scope="row">{{$order->order_number}}</th>
                <td>{{$order->created_at}}</td>
                <td>Rs. {{$order->grand_total}}</td>
            </tr>
            @endforeach
            <tr>
                <div class="bg-success text-white text-right p-1">
                    <h2>Total Income : Rs. {{$total}}</h2>
                </div>
            </tr>
        </tbody>
    </table>

</body>

</html>