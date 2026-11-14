
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Saints-Lastsons</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #171717;
            color: white;
            position: fixed;
            padding: 30px 20px;
        }

        .logo {
            font-size: 21px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 45px;
        }

        .sidebar p {
            font-size: 11px;
            color: #888;
            margin: 25px 0 12px;
        }

        .sidebar a {
            display: block;
            color: #ccc;
            text-decoration: none;
            padding: 13px;
            margin-bottom: 7px;
            border-radius: 6px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #333;
            color: white;
        }

        .main {
            margin-left: 250px;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            gap: 15px;
        }

        .topbar h1 {
            font-size: 25px;
        }

        .admin-info {
            color: #666;
            font-size: 14px;
        }

        .welcome {
            background: #222;
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .welcome h2 {
            margin-bottom: 10px;
        }

        .welcome p {
            color: #ccc;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #00000008;
        }

        .card p {
            color: #777;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .card h2 {
            font-size: 25px;
        }

        .section {
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        .section h3 {
            margin-bottom: 15px;
        }

        .section p {
            color: #777;
            line-height: 1.7;
        }

        .logout button {
            width: 100%;
            padding: 12px;
            background: #333;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 30px;
        }

        @media (max-width: 900px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            SAINTS-LASTSONS
        </div>

        <p>MAIN MENU</p>

        <a href="{{ route('admin.dashboard') }}" class="active">
            Dashboard
        </a>

        <p>MANAGEMENT</p>

        <a href="{{ route('admin.products.index') }}">Produk</a>
        <a href="#">Kategori</a>
        <a href="#">Pesanan</a>
        <a href="#">Pelanggan</a>

        <p>ACCOUNT</p>

        <a href="#">Pengaturan</a>

        <form action="{{ route('logout') }}"
              method="POST" class="logout">
            @csrf
            <button type="submit">Logout</button>
        </form>

    </aside>

    <main class="main">

        <div class="topbar">
            <h1>Dashboard</h1>

            <div class="admin-info">
                Administrator:
                {{ auth()->user()->name }}
            </div>
        </div>

        <div class="welcome">
            <h2>Welcome Back, Administrator!</h2>
            <p>
                Selamat datang di panel pengelolaan
                Saints-Lastsons Thrift Store.
            </p>
        </div>

        <div class="stats">

            <div class="card">
                <p>Total Produk</p>
                <h2>0</h2>
            </div>

            <div class="card">
                <p>Total Kategori</p>
                <h2>0</h2>
            </div>

            <div class="card">
                <p>Total Pesanan</p>
                <h2>0</h2>
            </div>

            <div class="card">
                <p>Total Pelanggan</p>
                <h2>0</h2>
            </div>

        </div>

        <div class="section">
            <h3>Saints-Lastsons Management</h3>

            <p>
                Dashboard ini digunakan untuk mengelola
                seluruh aktivitas toko, mulai dari produk,
                kategori, pesanan, hingga pelanggan.
            </p>

            <p>
                Silakan gunakan menu navigasi di sebelah kiri
                untuk mengelola toko.
            </p>
        </div>

    </main>

</body>
</html>
