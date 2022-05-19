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
    <h1 class="text-center">{{$supplier->name}} Stock Report </h1>
    <h5 class="text-center">{{$startdate}} to {{$enddate}}</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Supplied Date</th>
                <th>Product</th>
                <th>Supplier</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $stock)
                <tr>
                    <th scope="row">{{ $stock->created_at->format('Y-m-d') }}</th>
                    <td>{{ $stock->product->proname }}</td>
                    <td>{{ $stock->supplier->name }}</td>
                    <td>{{ $stock->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
