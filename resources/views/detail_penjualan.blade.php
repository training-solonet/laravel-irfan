<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail penjualan List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Optional Bootstrap CSS -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar detail penjualan</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Id penjualan</th>
                    <th>Jumlah barang</th>
                    <th>Subtotal</th>
                    <th>Nama barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_penjualan as $key => $detail_penjualan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $detail_penjualan->id_penjualan }}</td>
                        <td>{{ $detail_penjualan->jumlah_barang }}</td>
                        <td>{{ $detail_penjualan->subtotal }}</td>
                        <td>{{ $detail_penjualan->id_barang }}</td>                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
