<!-- resources/views/ResetPasswordView.blade.php -->
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('reset.password.post') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="username">Current Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm New Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <input type="hidden" name="token" value="{{ $token }}">
        <button type="submit">Reset Password</button>
    </form>

    @if (session('invalid_username'))
        <p style="color: red;">{{ session('invalid_username') }}</p>
    @endif
</body>
</html>
-->
