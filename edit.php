<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM krs WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nim            = $_POST['nim'];
    $nama           = $_POST['nama'];
    $tahun_akademik = $_POST['tahun_akademik'];
    $kelas          = $_POST['kelas'];
    $semester       = $_POST['semester'];
    $sks            = $_POST['sks'];
    $status_krs     = $_POST['status_krs'];

    $updateQuery = "UPDATE krs SET nim='$nim', nama='$nama', tahun_akademik='$tahun_akademik', 
                    kelas='$kelas', semester='$semester', sks='$sks', status_krs='$status_krs' WHERE id=$id";
    
    if (mysqli_query($koneksi, $updateQuery)) {
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
    <title>Edit Data KRS</title>
    <!-- Mengambil file Bootstrap langsung dari folder lokal laptopmu -->
    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5>Form Edit KRS</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3"><label class="form-label">NIM</label><input type="text" name="nim"
                            value="<?= $data['nim']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="nama"
                            value="<?= $data['nama']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Tahun Akademik</label><input type="text"
                            name="tahun_akademik" value="<?= $data['tahun_akademik']; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="Reguler">Reguler</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>
                    <div class="mb-3"><label class="form-label">Semester</label><input type="text" name="semester"
                            value="<?= $data['semester']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">SKS</label><input type="number" name="sks"
                            value="<?= $data['sks']; ?>" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Status KRS</label>
                        <select name="status_krs" class="form-select">
                            <option value="Disetujui" <?=$data['status_krs']=='Disetujui' ? 'selected' : '' ; ?>
                                >Disetujui</option>
                            <option value="Pending" <?=$data['status_krs']=='Pending' ? 'selected' : '' ; ?>>Pending
                            </option>
                        </select>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>