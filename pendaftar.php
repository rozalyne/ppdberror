<?php 
    include "config/koneksi.php";
    include "library/controller.php";
    $go = new controller();
    $tabel = "registrasi";
    @$field = array('noDaftar'=>$_POST['NoDaftar'],
                    'nama'=>$_POST['nama'],
                    'jk'=>$_POST['jk'],
                    'alamat'=>$_POST['alamat'],
                    'agama'=>$_POST['agama'],
                    'asalSmp'=> $_POST['asalSMP'],
                    'jurusan'=> $_POST['jurusan']
                );
    // @$go->simpan($con, $tabel, $field, $redirect);

    $redirect = '/paket1';
    @$where = "id = $_GET[id]";

    if(isset($_POST['simpan'])){
        $go->simpan($con, $tabel, $field, $redirect);
    }
    if(isset($_GET['hapus'])){
        $go->hapus($con, $tabel, $where, $redirect);
    }
    if(isset($_GET['edit'])){
        $edit = $go->edit($con, $tabel, $where);
    }
    if(isset($_POST['ubah'])){
        $go->ubah($con, $tabel, $field, $where, $redirect);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB</title>
</head>
<body>
    <a href="home.php">Kembali</a>
    <h1 align="center">Jumlah Pendaftar 2022/2023 SMK WIKRAMA BOGOR</h1>
    <br>

    <table style="background-color:#F0F8FF" align="center" border="1">
        <tr class="table-secondary">
            <th>No</th>
            <th>No Daftar</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Alamat Lengkap</th>
            <th>Agama</th>
            <th>Asal SMP</th>
            <th>Jurusan</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php 
            $data = $go->tampil($con, $tabel);
            $no = 0;
            if($data ==""){
                echo "<tr><td colspan='9'><center>No Record</center></td></tr>";
            }else{
                foreach($data as $r){
                    $no++
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $r['NoDaftar']; ?></td>
            <td><?php echo $r['nama']; ?></td>
            <td><?php echo $r['jk']; ?></td>
            <td><?php echo $r['alamat']; ?></td>
            <td><?php echo $r['agama']; ?></td>
            <td><?php echo $r['asalSMP']; ?></td>
            <td><?php echo $r['jurusan']; ?></td>
            <td><a href="?menu=user&hapus&id=<?php echo $r['id'] ?>" onclick="return confirm('Hapus Data?')" class="btn btn-danger btn-sm">HAPUS</a></td>
            <td><a href="?menu=user&edit&id=<?php echo $r['id'] ?>" class="btn btn-secondary btn-sm">EDIT</a></td>
            <td><a href="cetak.php?id=<?php echo $r['id'] ?>" class="btn btn-secondary btn-sm" target="_blank">CETAK</a></td>
        </tr>
        <?php } } ?>
</body>
</html>