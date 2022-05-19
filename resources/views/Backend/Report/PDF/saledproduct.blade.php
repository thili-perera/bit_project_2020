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
    <h1 class="text-center">Saled Product Report </h1>
    <h5 class="text-center">{{$startdate}} to {{$enddate}}</h5>
    <table class="table table-bordered">
        <thead>
             <tr>
                <th>Saled Date</th>
                <th>Product Name</th>
                <th>Product Salesprice</th>
                <th>Product Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $saled_product)
                @foreach ($saled_product->products as $item)
                <tr>
                    <td>{{$saled_product->created_at->format('Y-m-d')}}</td>
                    <td>{{ $item->proname }}</td>
                    <td>Rs. {{ $item->pivot->price }}</td>
                    <td>{{ $item->pivot->quantity }}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>
