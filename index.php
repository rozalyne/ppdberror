<?php 
    include "config/koneksi.php";
    include "library/controller.php";
    $go = new controller();
    $tabel = "registrasi";
    @$field = array('noDaftar'=>$_POST['noDaftar'],
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
    <h1 align="center">Formulir Pendaftaran Peserta Didik</h1>
    <form method="post">
        <table align="center" class="mx-3 mb-3 card shadow-sm p-3">
            <tr>
                <td>No Daftar</td>
                <td>:</td>
                <td><input type="number" class="form-control" name="noDaftar" value="<?php echo @$edit['noDaftar'] ?>" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="nama" value="<?php echo @$edit['nama'] ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><select name="jk" value="<?php echo @$edit['jk'] ?>" class="form-control m-1" required>
                        <!-- <option selected disabled>Jenis Kelamin</option> -->
                        <option disabled selected>Pilih Jenis Kelamin</option>
                        <option value="laki-laki" <?php if(@$edit['jk'] == 'laki-laki'){ echo 'selected';}?>>Laki-laki</option>
                        <option value="perempuan" <?php if(@$edit['jk'] == 'perempuan'){ echo 'selected';}?>>Perempuan</option>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="alamat" value="<?php echo @$edit['alamat'] ?>" required></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><select name="agama" value="<?php echo @$edit['agama'] ?>" class="form-control m-1" required>
                        <option disabled selected>Agama</option>
                        <option value="Islam" <?php if(@$edit['agama'] == 'Islam'){ echo 'selected';}?>>Islam</option>
                        <option value="Kristenan" <?php if(@$edit['agama'] == 'kristenan'){ echo 'selected';}?>>Kristenan</option>
                        <option value="Hindu" <?php if(@$edit['agama'] == 'Hindu'){ echo 'selected';}?>>Hindu</option>
                        <option value="Budha" <?php if(@$edit['agama'] == 'Budha'){ echo 'selected';}?>>Buddha</option>
                    </select>
            </tr>
            <tr>
                <td>Asal SMP</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="asalSMP" value="<?php echo @$edit['asalSMP'] ?>" required></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><select name="jurusan" value="<?php echo @$edit['jurusan'] ?>" class="form-control m-1" required>
                        <option disabled selected>Pilih Jurusan</option>
                        <option value="Rekayasa Perangkat Lunak" <?php if(@$edit['jurusan'] == 'Rekayasa Perangkat Lunak'){ echo 'selected';}?>>Rekayasa Perangkat Lunak</option>
                        <option value="Tata Boga" <?php if(@$edit['jurusan'] == 'Tata Boga'){ echo 'selected';}?>>Tata Boga</option>
                        <option value="Tata Busana" <?php if(@$edit['jurusan'] == 'Tata Busana'){ echo 'selected';}?>>Tata Busana</option>
                        <option value="Multimedia" <?php if(@$edit['jurusan'] == 'Multimedia'){ echo 'selected';}?>>Multimedia</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <?php if(@$_GET['id']==""){ ?>
                        <input type="submit" class="btn" name="simpan" value="SIMPAN">
                    <?php }else{ ?>
                        <input type="submit" class="btn" name="ubah" value="UBAH">
                    <?php } ?>
                </td>
            </tr>
        </table>
    </form>
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
    </table>
</body>
</html>