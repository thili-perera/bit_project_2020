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
    <h1 class="text-center">Order Tracking Report </h1>
    <h5 class="text-center">{{$startdate}} to {{$enddate}}</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Payment Date</th>
                <th>Order Number</th>
                <th>Order Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $tracking)
                <tr>
                    <th scope="row">{{ $tracking->updated_at->format('Y-m-d') }}</th>
                    <td>{{ $tracking->order_number }}</td>
                    <td><span class="badge badge-info">{{ $tracking->status }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
