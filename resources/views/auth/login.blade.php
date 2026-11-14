
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Saints-Lastsons</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            width: 380px;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px #00000015;
        }

        h2 {
            text-align: center;
            letter-spacing: 2px;
        }

        p {
            text-align: center;
            color: #777;
        }

        label {
            display: block;
            margin-top: 18px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 25px;
            background: #171717;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        a {
            color: black;
            font-weight: bold;
        }

        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>SAINTS-LASTSONS</h2>
    <p>Welcome Back! Please Login</p>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email"
            value="{{ old('email') }}"
            placeholder="Masukkan email" required>

        <label>Password</label>
        <input type="password" name="password"
            placeholder="Masukkan password" required>

        <button type="submit">LOGIN</button>
    </form>

    <p>
        Belum punya akun?
        <a href="{{ route('register') }}">Register</a>
    </p>

</div>

</body>
</html>
