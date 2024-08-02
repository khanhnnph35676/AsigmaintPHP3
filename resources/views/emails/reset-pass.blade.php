<!-- resources/views/emails/reset_password.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>{{ $data['name'] }}</h1>
    <p>Click vào đường dẫn dưới đây để đặt lại mật khẩu của bạn:</p>
   {{ $data['body'] }}
</body>
</html>
