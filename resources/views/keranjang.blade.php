@include('sidebar')
<html>

<head>
    <title>Transaksi Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container w-75 mt-5">
        <div class="text-center mb-4">
            <h2>Transaksi Penjualan</h2>
            <p>No Invoice : XXXXX</p>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pilihPelanggan" class="form-label">Pilih Pelanggan</label>
                <select class="form-select" id="pilihPelanggan">
                    <option selected>Pilih Pelanggan</option>
                    <!-- Add other options as needed -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="tanggal" class="form-label">Tanggal</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="tanggal" value="2024-10-03">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-success me-2">Simpan Penjualan</button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarangModal">Tambah Barang</button>
        </div>        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjang as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ number_format($item->jumlah_barang, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        <td class="text-center">

                            <!-- Tombol Delete -->
                            <form action="{{ route('keranjang.destroy', $item->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

      <!-- Add Barang Modal -->
<div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-labelledby="tambahBarangModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahBarangModalLabel">Tambah Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="barangSelect" class="form-label">Pilih Barang</label>
                    <select class="form-select" id="barangSelect" name="barang_id" required>
                        <option selected disabled>Pilih Barang</option>
                        @if (isset($barangs) && $barangs->count() > 0)
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                            @endforeach
                        @else
                            <option disabled>Tidak ada barang tersedia</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required min="1">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Barang</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

        <!-- Include Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-W1q4UM4v1Nf5Vs6gw1a2hx1P8lq8N4MmHxt9E26F1G7jOg4gUkaZJlKhz3cW0Hp" crossorigin="anonymous"></script>

    </div>
</body>

</html>
