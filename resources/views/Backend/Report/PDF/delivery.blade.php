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
    <h1 class="text-center">Delivery Report </h1>
    <h5 class="text-center">{{$startdate}} to {{$enddate}}</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Delivery Date</th>
                <th>Order Number</th>
                <th>Order Status</th>
                <th>Delivery Person</th>
                <th>Ordered Person</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $delivery)
                <tr>
                    <th scope="row">{{ $delivery->updated_at->format('Y-m-d') }}</th>
                    <td>{{ $delivery->order->order_number }}</td>
                    <td><span class="badge badge-info">{{ $delivery->order->status }}</span></td>
                    <td>{{$delivery->user->username}}</td>
                    @php
                        $ordered_person = \App\Model\User::where('id',$delivery->order->user_id)->first();
                    @endphp
                    <td>{{$ordered_person->username}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
