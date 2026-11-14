
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Saints-Lastsons</title>

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
            width: 400px;
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
            margin-top: 15px;
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
    <p>Create Your Account</p>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <label>Nama Lengkap</label>
        <input type="text" name="name"
            value="{{ old('name') }}"
            placeholder="Nama lengkap" required>

        <label>Email</label>
        <input type="email" name="email"
            value="{{ old('email') }}"
            placeholder="Email aktif" required>

        <label>Nomor HP</label>
        <input type="text" name="phone"
            value="{{ old('phone') }}"
            placeholder="Nomor HP">

        <label>Password</label>
        <input type="password" name="password"
            placeholder="Minimal 8 karakter" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation"
            placeholder="Ulangi password" required>

        <button type="submit">REGISTER</button>
    </form>

    <p>
        Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
    </p>

</div>

</body>
</html>
