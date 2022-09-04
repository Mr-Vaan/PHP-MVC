<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman <?= $data['judul']; ?> </title>
    <!-- Koneksi Manual atau Lokal CSS -->
    <!-- <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css"> -->
    <!-- Online CSS Framework -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= BASEURL; ?>">Manusia Educations</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
                <a class="nav-link active" href="<?= BASEURL; ?>">Home <span class="sr-only"></span></a>
                <a class="nav-link" href="<?= BASEURL; ?>/mahasiswa">Mahasiswa</a>
                <a class="nav-link" href="<?= BASEURL; ?>/about">About</a>
            </div>
        </div>
    </div>
</nav>