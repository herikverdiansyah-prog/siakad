<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Data KRS</title>
    <!-- Mengambil file Bootstrap langsung dari folder lokal laptopmu -->
    <link href="bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">


    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-item-center py-3">
                <h5 class="mb-0 text-secondary fw-bold">Sistem Informasi Akademik</h5>
                <a href="tambah.php" class="btn btn-primary btn-sm">+ Tambah Data KRS</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0 text-center align-middle">
                        <thead class="table-light text-secondary fw-semibold">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Tahun Akademik</th>
                                <th>Kelas</th>
                                <th>Semester</th>
                                <th>SKS</th>
                                <th>Status KRS</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $query = "SELECT * FROM krs ORDER BY id ASC";
                        $result = mysqli_query($koneksi, $query);                        
                        $no = 1;

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$no++."</td>";
                                echo "<td>".$row['nim']."</td>";
                                echo "<td>".$row['nama']."</td>";
                                echo "<td>".$row['tahun_akademik']."</td>";
                                echo "<td>".$row['kelas']."</td>";
                                echo "<td>".$row['semester']."</td>";
                                echo "<td>".$row['sks']."</td>";
                                echo "<td><span class='badge bg-success'>".$row['status_krs']."</span></td>";
                                echo "<td class='text-nowrap'>
                                    <a href='edit.php?id=".$row['id']."' class='btn btn-warning btn-sm px-3 fw-semibold text-dark me-1'>Edit</a>
                                    <a href='hapus.php?id=".$row['id']."' class='btn btn-danger btn-sm px-3 fw-semibold' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9' class='py-4 text-muted fs-5'>Data KRS belum tersedia.</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>