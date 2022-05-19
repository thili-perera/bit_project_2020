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
    <h1 class="text-center">Customer Report </h1>
    <h5 class="text-center">{{$startdate}} to {{$enddate}}</h5>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Joined Date</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $customer)
                <tr>
                    <th scope="row">{{ $customer->created_at }}</th>
                    <td>{{ $customer->username }}</td>
                    <td>{{$customer->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>