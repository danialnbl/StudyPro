<!-- resources/views/LoginView.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <input type="username" id="username" name="username" required placeholder=Username>
        </div>
        <div>
            <input type="password" id="password" name="password" required placeholder=Password>
            <p>Forgot password?</p>
        </div>
        <div class=btn>
        <button type="button" class="btn btn-primary"
        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
        Login
        </button>
        </div>
    </form>
</body>
</html>


