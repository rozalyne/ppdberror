<?php
    include "config/koneksi.php";
    include "library/controller.php";
    $go = new controller();
    $tabel = "registrasi";

    $where = "id = $_GET[id]";
                    $edit = $go->cetak($con, $tabel, $where);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Data Siswa</title>
</head>
<body>
    <h1 align="center">Download Data Peserta Didik <?php echo $edit['nama']?></td></h1>
    <table>
        <tr>
            <td>No Daftar</td>
            <td>:</td>
            <td><?php echo $edit['NoDaftar']?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?php echo $edit['nama']?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?php echo $edit['jk']?></td>
        </tr>
        <tr>
            <td>Alamat Lengkap</td>
            <td>:</td>
            <td><?php echo $edit['alamat']?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?php echo $edit['agama']?></td>
        </tr>
        <tr>
            <td>Asal SMP</td>
            <td>:</td>
            <td><?php echo $edit['asalSMP']?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td><?php echo $edit['jurusan']?></td>
        </tr>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>