<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Data Karyawan</title>
    <link rel="stylesheet" href="styleHapusKaryawan.css?v=<?php echo time(); ?>">
    <script src="scriptHapusKaryawan.js?v=<?php echo time(); ?>"></script>
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

    $sql = "SELECT * FROM karyawans";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // output data of each row

        echo " <center><h1>Hapus Data Karyawan</h1><input type='text' name='searching' id='searching' placeholder='Cari...' onkeyup='seacrh()'><div class='tabel-sc'>
  <table table id='tabelKaryawan' cellspacing='0' width='100%' onclick='tampil()'>
  <thead>
  <th>No.</th>
  <th>Kode</th>
  <th>Nama karyawan</th>
  <th>No. Telepon</th>
  </thead><tbody>";
        // <!-- <?php -->
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $i++ . "</td><td>" . $row["Kode_Karyawan"] . "</td><td>" . $row["Nama_Karyawan"] . "</td>
            <td>" . $row["No_Telp_Karyawan"] . "</td></tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo "0 results";
    }
    ?>
    <form action="" method="POST">
        <h3>Data Karyawan</h3>
        <label for="kode">Kode</label>
        <input type="text" name="kode" readonly id="kode"><br><br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" readonly id="nama"><br><br>
        <label for="no_telp">No. Telepon</label>
        <input type="text" name="no_telp" readonly id="no_telp"><br><br>
        <button name="hapus" type="submit" id="hapus">Hapus</button>
    </form>
    <?php
    if (isset($_POST['hapus'])) {
        $sql = "DELETE FROM karyawans WHERE Kode_Karyawan ='" . $_POST['kode'] . "'";
        if ($conn->query($sql) === TRUE) {
    ?>
            <script language="JavaScript">
                alert("Data berhasil dihapus");
            </script>

        <?php
            echo " <meta http-equiv=\"refresh\" content=\"0\" /> ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        ?>
    <?php
    } else {
    }
    $conn->close();
    ?>


    </center>

</body>

</html>