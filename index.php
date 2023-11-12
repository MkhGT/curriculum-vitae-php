<?php
include("config.php");

$query = "SELECT * FROM data_cv WHERE id = 1";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
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
    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="bg-dark min-vh-100 p-3">
        <div class="container-fluid bg-light rounded-3">
            <!-- Navbar -->
            <nav class="navbar bg-transparent">
                <div class="container-fluid d-flex">
                    <span class="navbar-brand text-secondary mb-0 fw-bold">Curriculum Vitae</span>
                    <ul class="navbar-nav d-flex flex-row me-1">
                        <li class="nav-items">
                            <a href="index.php" class="nav-link active me-2">Home</a>
                        </li>
                        <li class="nav-items">
                            <a href="edit.php" class="nav-link">Update</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Navbar Ends -->
            <!-- Hero -->
            <section class="hero min-vh-40">
                <div class="row d-flex justify-content-center ms-2 mt-3">
                    <div class="image col-2"><img class="w-200p h-200p rounded-circle border border-light"
                            src="<?php echo $data['foto_path']; ?>">
                    </div>
                    <div class="flex-column col-5 ms-4 d-flex justify-content-center">
                        <h4>Hello! my name is</h4>
                        <h1 class='fw-bold'>
                            <?php echo $data['nama'] ?>
                        </h1>
                        <p>Student Informatics Major at Sultan Ageng Tirtayasa University. I have deep interest for
                            technologies development</p>
                    </div>
                </div>
            </section>
            <!-- Body -->
            <section class="body mt-3">
                <div class="cards d-flex justify-content-center gap-2">
                    <div class="card p-3 border border-0 bg-light" style="width: 18rem;">
                        <h5 class="card-title"><i data-feather="book-open" class='me-1'
                                style='color: brown ;'></i>Pendidikan</h5>
                        <p class="card-text">
                            <?php
                            $arrayPendidikan = explode(",", $data['pendidikan']);
                            foreach ($arrayPendidikan as $nilai) {
                                echo $nilai . '<br>';
                            } ?>
                        </p>
                    </div>
                    <div class="card p-3 border border-0 bg-light" style="width: 18rem;">
                        <h5 class="card-title"><i data-feather="git-branch" class='me-1'
                                style='color: purple;'></i>Skills</h5>
                        <p class="card-text">
                            <?php
                            $arraySkill = explode(",", $data['keterampilan']);
                            foreach ($arraySkill as $nilai) {
                                echo $nilai . '<br>';
                            } ?>
                        </p>
                    </div>
                    <div class="card p-3 border border-0 bg-light" style="width: 18rem;">
                        <h5 class="card-title"><i data-feather="command" class='me-1'
                                style='color: pink;'></i>Experience</h5>
                        <p class="card-text">
                            <?php
                            $arrayExp = explode(",", $data['pengalaman_kerja']);
                            foreach ($arrayExp as $nilai) {
                                echo $nilai . '<br>';
                            } ?>
                        </p>
                    </div>
                </div>
            </section>
            <!-- Contact -->
            <section class="contact d-flex justify-content-center pb-3">
                <div class="card border border-0 bg-light" style="width: 80%">
                    <div class="card-body">
                        <h3 class="pb-2">Contact</h3>
                        <h5 class="card-title"><i data-feather="mail" class='me-1 mb-1' style='color: blue;'></i>Email
                        </h5>
                        <p class="card-text ms-4">
                            <?php echo $data['email']; ?>
                        </p>
                        <h5 class="card-title"><i data-feather="phone" class='me-1 mb-1' style='color: green;'></i>No.
                            Telepon</h5>
                        <p class="card-text ms-4">
                            <?php echo $data['telepon']; ?>
                        </p>
                        <h5 class="card-title"><i data-feather="github" class='me-1 mb-1'></i>Web</h5>
                        <p class="card-text ms-4">
                            <?php echo $data['web']; ?>
                        </p>
                        <h5 class="card-title"><i data-feather="map-pin" class='me-1 mb-1'
                                style='color: red;'></i>Alamat</h5>
                        <p class="card-text ms-4">
                            <?php echo $data['alamat']; ?>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>
</body>

</html>