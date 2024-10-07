<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Sidebar Example</title>
    <style>
        body {
            display: flex;
            margin: 0; /* Menghapus margin default untuk body */
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 15px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }
        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none; /* Menentukan tidak ada garis bawah */
            padding: 10px;
            display: flex;
            align-items: center;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
            text-decoration: none
        }
        .sidebar a:focus, .sidebar a:active {
            outline: none; /* Menghapus outline saat link dalam fokus atau aktif */
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>
<body>

 <div class="sidebar">
    <h2>Sidebar</h2>
    <ul class="list-unstyled">
        <li><a href="{{ route('barang.index') }}"><i class="fas fa-box"></i> Barang</a></li>
        <li><a href="{{ route('pelanggan.index') }}"><i class="fas fa-users"></i> Pelanggan</a></li>
        <li><a href="{{ route('penjualan.index') }}"><i class="fas fa-shopping-cart"></i> Penjualan</a></li>
    </ul>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
