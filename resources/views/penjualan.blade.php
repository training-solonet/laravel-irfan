@include('sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjualan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Optional Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container col-8 mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-info">Daftar Penjualan</h1>
            <a href="{{ route('keranjang.index') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Penjualan
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan as $key => $item)
                        <tr class="text-center">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                <!-- Tombol Detail -->
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal" data-id="{{ $item->id }}" data-nama="{{ $item->nama_pelanggan }}" data-tanggal="{{ $item->tanggal }}">
                                    <i class="fas fa-info-circle"></i> Detail
                                </button>

                                <!-- Tombol Delete -->
                                <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus penjualan ini?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Detail Penjualan -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>ID:</strong> <span id="detail-id"></span></p>
                    <p><strong>Nama Pelanggan:</strong> <span id="detail-nama"></span></p>
                    <p><strong>Tanggal:</strong> <span id="detail-tanggal"></span></p>
                    <!-- Anda bisa menambahkan informasi detail lainnya di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Event listener untuk modal
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var id = button.data('id'); // Ambil data-id dari tombol
            var nama = button.data('nama'); // Ambil data-nama dari tombol
            var tanggal = button.data('tanggal'); // Ambil data-tanggal dari tombol

            // Isi data ke dalam modal
            var modal = $(this);
            modal.find('#detail-id').text(id);
            modal.find('#detail-nama').text(nama);
            modal.find('#detail-tanggal').text(tanggal);
        });
    </script>
</body>
</html>
