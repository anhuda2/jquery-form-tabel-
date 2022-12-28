<?php 

    include('connect.php');

    $nama       = $_POST['nama'];
    $ttl    = $_POST['ttl'];
    $unit         = $_POST['unit'];
    $gender         = $_POST['gender'];
    $alamat         = $_POST['alamat'];
    $nomorhp         = $_POST['nomor-hp'];

    $insert = mysqli_query($connect, "INSERT INTO mahasiswa SET 
    nama='$nama', 
    ttl='$ttl  ', 
    unit='$unit',
    gender='$gender',
    alamat='$alamat',
    `nomor-hp`='$nomorhp'
    ");

?>