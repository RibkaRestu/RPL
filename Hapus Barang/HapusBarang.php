<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Data Karyawan</title>
    <link rel="stylesheet" href="styleHapusBarang.css?v=<?php echo time(); ?>">
    <script src="scriptHapusBarang.js?v=<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, '', '.');
        return $hasil_rupiah;
    }
    function hilangkanRupiah($rp)
    {
        $hasil = preg_replace('/[Rp. ]/', '', $rp);
        return $hasil;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toko_mata_dewa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Koneksi Gagal : " . $conn->connect_error);
    }

    $sql = "SELECT * FROM barang";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // output data of each row

        echo "<center><h1>Hapus Data Barang</h1><input type='text' name='searching' id='searching' placeholder='Cari...' onkeyup='seacrh()'><div class='tabel-sc'>
  <table table id='tabelBarang' cellspacing='0' width='100%' onclick='tampil()'>
  <thead>
  <th>No.</th>
  <th>Kode</th>
  <th>Nama barang</th>
  <th>Harga</th>
  <th>Stok</th>
  </thead><tbody>";
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $i++ . "</td><td>" . $row["Kode_Barang"] . "</td><td>" . $row["Nama_Barang"] . "</td>
            <td>" . rupiah($row["Harga_Barang"]) . "</td><td>" . $row["Stock_Barang"] . "</td></tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo "0 results";
    }
    ?>
    <form action="" method="POST">
        <h3>Data Barang</h3>
        <label for="kode">Kode</label>
        <input type="text" name="kode-barang" id="kode"><br><br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" readonly><br><br>
        <label for="harga">Harga</label>
        <input type="text" name="harga" id="harga" readonly><br><br>
        <label for="stok">Stok</label>
        <input type="text" name="stok" id="stok" readonly><br><br>
        <button type="button" name="hapus-barang" id="hapusBarang" data-toggle="modal" data-target="#myModal">Hapus</button>
        <!-- <input type="button" name="hapus-test" id="hapus" class="btn btn-primary"  value="Hapus"> -->
        <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="hapus" id="hapus">Hapus</button> -->
    </form>
    <?php 
    $kodeb;
    if(isset($_POST['hapus-barang'])){
      $kodeb = $_POST['kode-barang'];
      echo"<script>alert('Hoi ".$kodeb."');</script>";
    }
    ?>
    </center>
<script>
    function ambilKode(kode){
  document.getElementById('kodeBarang').value=document.getElementById('kode');
}
</script>

<!-- pop up -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">KONFIRMASI</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div>
            <p>Ingin Menghapus Data</p>
            <p>Dengan Kode Barang:</p>
          </div>
          <div>
            <form action="" method="POST" style="border: none;">
            <button name="hapus-konfir" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="ambil()">Yah</button>
            <button type="submit" class="btn-pop-up-batal btn-danger" name="batal">Batal</button> 
            data-dismiss="modal"   
        </form>
          </div>
        </div>
        Modal footer
        <div class="modal-footer">
          <button type="submit" class="btn-pop-up-batal btn-danger" data-dismiss="modal" name="batal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  

<?php 
    //  if (isset($_POST['hapus-konfir'])) {
    //     echo"<script>alert('Hoi ".$kode."');</script>";
        // $sql = "DELETE FROM barang  WHERE Kode_Barang='" . $kode . "'";
        //         if ($conn->query($sql) === TRUE) {
        //             echo "<script>alert('Data Berhasil Di Hapus')</script>";
        //             // echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
        //         }
    //  } elseif (isset($_POST['batal'])){
    //     echo"<script>alert('Hai');</script>";
    //  }
    
?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>