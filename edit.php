<?php
include 'config.php';

function getCVData()
{
    global $conn;
    $query = "SELECT * FROM data_cv WHERE id = 1"; // Sesuaikan dengan id CV 
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_array($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $email = htmlspecialchars($_POST['email']);
    $web = htmlspecialchars($_POST['web']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $pengalaman_kerja = htmlspecialchars($_POST['pengalaman_kerja']);
    $keterampilan = htmlspecialchars($_POST['keterampilan']);
    $foto_path = htmlspecialchars($_POST['foto_path']);

    $query = "UPDATE data_cv SET 
        nama = ?, 
        alamat = ?, 
        telepon = ?, 
        email = ?, 
        web = ?, 
        pendidikan = ?, 
        pengalaman_kerja = ?, 
        keterampilan = ?, 
        foto_path = ? 
        WHERE id = 1"; // Sesuaikan dengan id CV 

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $nama, $alamat, $telepon, $email, $web, $pendidikan, $pengalaman_kerja, $keterampilan, $foto_path);

    if (mysqli_stmt_execute($stmt)) {
        echo 'Data berhasil diperbarui';
        print 'Data berhasil diperbarui';
    } else {
        echo 'Terjadi kesalahan saat memperbarui data';
        print 'Data gagal diperbarui';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header('Location: index.php');
    exit();
}

$data = getCVData();
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="styles/style.css">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="bg-dark min-vh-100 p-3">
        <div class="container-fluid bg-light rounded-3">
            <!-- Navbar -->
            <nav class="navbar bg-transparent">
                <div class="container-fluid d-flex">
                    <span class="navbar-brand text-secondary mb-0 fw-bold">Curriculum Vitae-Update</span>
                    <ul class="navbar-nav d-flex flex-row me-1">
                        <li class="nav-items">
                            <a href="index.php" class="nav-link me-2">Home</a>
                        </li>
                        <li class="nav-items">
                            <a href="edit.php" class="nav-link active">Update</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Navbar Ends -->
            <section class="form d-flex justify-content-center">
                <form class='pb-3' style='width: 90%;' action="edit.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name='nama' value="<?php echo $data['nama'] ?>"
                            placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name='email' value="<?php echo $data['email'] ?>"
                            placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" name='telepon' value="<?php echo $data['telepon'] ?>"
                            placeholder="Telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name='alamat' value="<?php echo $data['alamat'] ?>"
                            placeholder="Alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="web" class="form-label">Web</label>
                        <input type="url" class="form-control" name='web' value="<?php echo $data['web'] ?>"
                            placeholder="Web" required>
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <textarea class="form-control" id="pendidikan" name="pendidikan" rows="3"
                            placeholder="Pendidikan" required><?php echo $data['pendidikan']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="keterampilan" class="form-label">Skill</label>
                        <textarea class="form-control" id="keterampilan" name="keterampilan" rows="3"
                            placeholder="Keterampilan" required><?php echo $data['keterampilan']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pengalaman_kerja" class="form-label">Experience</label>
                        <textarea class="form-control" id="pengalaman_kerja" name="pengalaman_kerja" rows="3"
                            placeholder="Pengalaman Kerja" required><?php echo $data['pengalaman_kerja']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto_path" class="form-label">Path Foto</label>
                        <input type="text" class="form-control" name='foto_path'
                            value="<?php echo $data['foto_path'] ?>" placeholder="Foto Path" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </section>
        </div>
    </div>
</body>

</html>