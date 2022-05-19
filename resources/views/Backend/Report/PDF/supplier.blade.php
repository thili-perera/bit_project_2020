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
    <h1 class="text-center">Supplier Report </h1>
    <h5 class="text-center">{{$startdate}} to {{$enddate}}</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Added Date</th>
                <th>Supplier Name</th>
                <th>Supplier Email</th>
                <th>Supplier Contact</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $supplier)
                <tr>
                    <th scope="row">{{ $supplier->created_at->format('Y-m-d') }}</th>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->contact }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
