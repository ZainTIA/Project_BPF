
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Saints-Lastsons Thrift Store</title>
</head>
<body>

    <h1>SAINTS-LASTSONS THRIFT STORE</h1>

    <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>

    <p>Temukan koleksi thrift pilihan kami.</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
