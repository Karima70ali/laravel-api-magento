<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Customer data in Laravel </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Postcode</th>
                            <th>City</th>
                            <th>Country Id</th>
                            <th>Customer Id</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->firstname }}</td>
                                <td>{{ $item->lastname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->telephone }}</td>
                                <td>{{ $item->postcode }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->country_id }}</td>
                                <td>{{ $item->customer_id }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
