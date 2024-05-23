<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        *{
            font-family: Arial, Helvetica, sans-serif
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td{
            border: 1px solid #333;
        }
    </style>
</head>
<body>
    <h1>Our Plants</h1>

    <hr>

    <table class="table table-bordered table-striped">
        <thead class="table-pink">
            <tr>
                <th>Plant</th>
                <th>Name</th>
                <th>Price</th>
                <th> QR code </th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($plant as $plant)
                <tr>
                    <td><img src="{{ $plant->imageUrl }}" alt="{{ $plant->name }}" style="max-width: 100px;"></td>
                    <td>{{ $plant->name }}</td>
                    <td>${{ $plant->price }}</td>
                   <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(100)->generate($plant->name)) }}" alt="QR Code"></td>
                </tr>
            @endforeach
          
        </tbody>
    </table>

</body>
</html>