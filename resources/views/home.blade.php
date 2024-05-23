<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://unpkg.com/html5-qrcode"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .buttons {
            background-color: #1A4D2E;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 30px;
            font-weight: bold;
        }

        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        li {
            margin-right: 10px;
        }

        a {
            text-decoration: none;
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover, a.active {
            background: #799351;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            margin-left: 6%;
            margin-top: 2%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .plant {
            margin-left: 5%;
        }

        .navv {
            margin-right: 3%;
        }
    </style>    
</head>
<body>
    <div class="d-flex justify-content-between align-items-center buttons">
        <h1 class="plant">Our Plants</h1>
        <div class="navv">
            <ul>
                <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('/plant') }}" class="{{ Request::is('plant') ? 'active' : '' }}">Plants</a></li>
                <li><a href="{{ url('/scanner') }}" class="{{ Request::is('scanner') ? 'active' : '' }}">QR Scanner</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
