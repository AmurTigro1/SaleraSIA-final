@extends('home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="display-4">Discover Our Plants</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. In, et!</p>
            <a href="#" class="btn btn-primary">Explore Now</a>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('https://i.pinimg.com/236x/df/78/a7/df78a7585abfcca5a26848468f1f902f.jpg') }}" alt="Monstera" class="img-fluid rounded">
        </div>
    </div>
</div>

<style>
    /* Custom Styles */
    .container {
        padding-top: 100px;
        padding-bottom: 100px;
    }

    .display-4 {
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    .lead {
        font-family: 'Arial', sans-serif;
        color: #666;
    }

    /* Optional: Add your own custom styles to further enhance the design */
</style>
@endsection
