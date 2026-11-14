
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - Saints Lastsons</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f5f5;
            color: #222;
            padding: 35px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 27px;
        }

        .subtitle {
            color: #777;
            margin-top: 8px;
        }

        .btn {
            display: inline-block;
            padding: 11px 17px;
            background: #111;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .btn:hover {
            background: #444;
        }

        .table-container {
            background: white;
            padding: 22px;
            border-radius: 10px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
            font-size: 13px;
        }

        th {
            color: #777;
            background: #fafafa;
        }

        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            background: #eee;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .edit {
            background: #333;
        }

        .delete {
            background: #b42318;
        }

        .success {
            padding: 13px;
            background: #e8f7ed;
            color: #18743b;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .empty {
            text-align: center;
            color: #888;
            padding: 35px;
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Manajemen Produk</h1>
            <p class="subtitle">Kelola produk thrift store Saints Lastsons.</p>
        </div>

        <a href="{{ route('admin.products.create') }}" class="btn">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>SKU</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kondisi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $products->firstItem() + $loop->index }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->category->name ?? '-' }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->condition->value ?? $product->condition }}</td>
                        <td>
                            <span class="badge">
                                {{ $product->status->value ?? $product->status }}
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                   class="btn edit">Edit</a>

                                <form action="{{ route('admin.products.destroy', $product->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn delete">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="empty">
                            Belum ada produk. Silakan tambahkan produk pertama.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            {{ $products->links() }}
        </div>
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('admin.dashboard') }}" class="btn">
            Kembali ke Dashboard
        </a>
    </div>

</div>
</body>
</html>
