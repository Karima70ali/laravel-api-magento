<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Customer come from target Magento
        </div>
        <div class="card-body">
            <form name="get-customer-target-form" id="get-customer-target-form" method="post" action="{{url('store-form')}}">
                @csrf
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" value="{{ $firstname}}" id="firstname" name="firstname" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input name="lastname" value="{{ $lastname}}" class="form-control" required=""></input>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" value="{{ $email}}" class="form-control" required=""></input>
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input name="telephone" value="{{$addresses[0]["telephone"]}}" class="form-control" required=""></input>
                </div>
                <div class="form-group">
                    <label for="postcode">Postcode</label>
                    <input name="postcode" value="{{$addresses[0]["postcode"]}}" class="form-control" required=""></input>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input name="city" value="{{$addresses[0]["city"]}}" class="form-control" required=""></input>
                </div>
                <div class="form-group">
                    <label for="country_id">Country_id</label>
                    <input name="country_id"  value="{{$addresses[0]["country_id"]}}" class="form-control" required=""></input>
                </div>
                <div class="form-group">
                    <label for="customer_id">Customer_id</label>
                    <input name="customer_id" value="{{$addresses[0]["customer_id"]}}" class="form-control" required=""></input>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
