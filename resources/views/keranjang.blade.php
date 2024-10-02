<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pelanggan List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Optional Bootstrap CSS -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar pelanggan</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama barang</th>
                    <th>harga</th>
                    <th>jumlah barang</th>
                    <th>subtotal</th>
                    <th>id penjualan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjang as $key => $keranjang)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $keranjang->id_barang }}</td>
                        <td>{{ $keranjang->harga }}</td>
                        <td>{{ $keranjang->jumlah_barang }}</td>
                        <td>{{ $keranjang->subtotal }}</td>
                        <td>{{ $keranjang->id_penjualan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
