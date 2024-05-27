<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/pdf.css') }}" type="text/css">
</head>
<body>
    <h1>List of Experts</h1>
    <table class="products">
        <tr>
            <th>#</th>
            <th>Expert Name</th>
            <th>Expert University</th>
            <th>Expert Email</th>
            <th>Expert Phone Number</th>
            <th>Expert Domain</th>
        </tr>

        @foreach($experts as $expert)
        <tr class="items">
                <td>{{$loop->index+1}}</td>
                <td>{{$expert->E_Name}}</td>
                <td>{{$expert->E_University}}</td>
                <td>{{$expert->E_Email}}</td>
                <td>{{$expert->E_PhoneNumber}}</td>
                <td>{{$expert->E_Domain}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
