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
    <h1 class="text-center">Payment Report </h1>
    <h5 class="text-center">{{$startdate}} to {{$enddate}}</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Payment Date</th>
                <th>Order Number</th>
                <th>Payment Method</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @php
                $amount = 0; 
            @endphp
            @foreach ($data as $payment)
            @php
                $amount += $payment->grand_total
            @endphp
                <tr>
                    <th scope="row">{{ $payment->created_at->format('Y-m-d') }}</th>
                    <td>{{ $payment->order_number }}</td>
                    <td><span class="badge badge-info">{{ $payment->payment_method }}</span></td>
                    <td>{{$payment->grand_total}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="bg-success text-white p-2 text-right">
        <h2>Total Amount : Rs. {{$amount}}</h2>
    </div>
</body>

</html>
