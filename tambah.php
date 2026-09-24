<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-4" style="max-width: 500px;">
        <div class="card shadow-sm border-0">
            <div class="card-body p-3">
                <h5 class="card-title fw-bold mb-3 text-center">Tambah Member</h5>
                
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="mb-2">
                        <label for="nama" class="form-label form-label-sm mb-1">Nama</label>
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" required>
                    </div>

                    <div class="row g-2 mb-2">
                        <div class="col-6">
                            <label for="email" class="form-label form-label-sm mb-1">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                        </div>
                        <div class="col-6">
                            <label for="no_telp" class="form-label form-label-sm mb-1">No Telp</label>
                            <input type="tel" class="form-control form-control-sm" id="no_telp" name="no_telp" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="level_member" class="form-label form-label-sm mb-1">Level Member</label>
                        <select class="form-select form-select-sm" id="level_member" name="level_member" required>
                            <option value="" selected disabled>-- Pilih Level --</option>
                            <option value="Basic">Basic</option>
                            <option value="Gold">Gold</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="foto" class="form-label form-label-sm mb-1">Foto Profil</label>
                        <input type="file" class="form-control form-control-sm" id="foto" name="foto">
                    </div>
                    <div class="mb-3">
                        <label class="form-label form-label-sm d-block mb-1">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="aktif" value="Aktif" checked>
                            <label class="form-check-label small" for="aktif">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="non_aktif" value="Non-Aktif">
                            <label class="form-check-label small" for="non_aktif">Non-Aktif</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="index.php" class="btn btn-sm btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-sm btn-primary px-3">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>