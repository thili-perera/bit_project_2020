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
    <h1 class="text-center">User Report </h1>
    <h5 class="text-center">{{$startdate}} to {{$enddate}}</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Joined Date</th>
                <th>User Username</th>
                <th>User Email</th>
                <th>User Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
                <tr>
                    <th scope="row">{{ $user->created_at->format('Y-m-d') }}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    @foreach ($user->roles as $role)
                    <td><span class="badge badge-info">{{ $role->rname }}</span></td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
