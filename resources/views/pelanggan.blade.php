@include('sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar pelanggan</title>
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
            <h1 class="text-info">Daftar pelanggan</h1>
            <button class="btn btn-success btn-sm p-2" data-toggle="modal" data-target="#tambahPelangganModal">
                <i class="fas fa-plus">Tambah Pelanggan</i> 
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $key => $item)
                        <tr class="text-center">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->telepon}}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $item->id }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <!-- Tombol Delete -->
                                <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus pelanggan ini?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit pelanggan</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/pelanggan/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="nama_pelanggan">Nama pelanggan</label>
                                                <input type="text" name="nama_pelanggan" class="form-control" value="{{ $item->nama_pelanggan }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">alamat</label>
                                                <input type="text" name="alamat" class="form-control" value="{{ $item->alamat }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="telepon">telepon</label>
                                                <input type="number" name="telepon" class="form-control" value="{{ $item->telepon }}" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Modal Tambah Pelanggan -->
                <div class="modal fade" id="tambahPelangganModal" tabindex="-1" role="dialog" aria-labelledby="tambahPelangganLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <!-- Header Modal dengan warna biru -->
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="tambahPelangganLabel">
                                    <i class="fas fa-plus"></i> Tambah Pelanggan
                                </h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        
                            <!-- Isi Modal -->
                            <div class="modal-body">
                                <form action="{{ route('pelanggan.update', $item->id) }}" method="POST">
                                    @csrf
                                
                                    <div class="form-group">
                                        <label for="nama_pelanggan">Nama Pelanggan</label>
                                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" placeholder="Masukkan nama pelanggan" required>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat pelanggan" required>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input type="number" name="telepon" id="telepon" class="form-control" placeholder="Masukkan nomor telepon" required>
                                    </div>
                                    <!-- Footer Modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan Pelanggan</button>
                                    </div>
                                </form>
                            </div>
                        
                        </div>
                    </div>
                </div>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>




