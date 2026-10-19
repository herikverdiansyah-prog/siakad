<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nim            = $_POST['nim'];
    $nama           = $_POST['nama'];
    $tahun_akademik = $_POST['tahun_akademik'];
    $kelas          = $_POST['kelas'];
    $semester       = $_POST['semester'];
    $sks            = $_POST['sks'];
    $status_krs     = $_POST['status_krs'];

    $query = "INSERT INTO krs (nim, nama, tahun_akademik, kelas, semester, sks, status_krs) 
              VALUES ('$nim', '$nama', '$tahun_akademik', '$kelas', '$semester', '$sks', '$status_krs')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Data KRS</title>
    <!-- Mengambil file Bootstrap langsung dari folder lokal laptopmu -->
    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5>Form Tambah KRS</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3"><label class="form-label">NIM</label><input type="text" name="nim"
                            class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="nama"
                            class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Tahun Akademik</label><input type="text"
                            name="tahun_akademik" class="form-control" placeholder="Contoh: 2026/2027" required></div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="Reguler">Reguler</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>

                    <div class="mb-3"><label class="form-label">Semester</label><input type="text" name="semester"
                            class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">SKS</label><input type="number" name="sks"
                            class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Status KRS</label>
                        <select name="status_krs" class="form-select">
                            <option value="Disetujui">Disetujui</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-success">Simpan Data</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>