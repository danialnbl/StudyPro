@extends('layout.main')
@section('container')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .profile-container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
            background: #fff;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .profile-header h1 {
            margin: 0;
            padding: 0;
        }
        .profile-details {
            margin: 20px 0;
        }
        .profile-details h2 {
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }
        .profile-details p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <img src="profile-picture.jpg" alt="Profile Picture">
            <h1>My CRMP Name</h1>
            <p>Title : </p>
        </div>
        <div class="profile-details">
            <h2>Platinum Group : _ </h2>
            <p>Coach Roket Master PhD (CRMP)</p>
        </div>
        <div class="profile-details">
            <h2>Contact Information</h2>
            <p>Email: crmpemail@gmail.com</p>
            <p>Phone: 011-36538346</p>
            <p>Address: 1234 Peramu, Pekan, Pahang</p>
        </div>
    </div>
</body>
</html>

@endsection