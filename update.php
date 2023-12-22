<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include ('connect.php');
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];
    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
    function update($id, $nama, $brand, $warna, $tipe, $harga){
        global $connect;
        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $brand = $_POST['brand'];
        $warna = $_POST['warna'];
        $tipe = $_POST['tipe'];
        $harga = $_POST['harga'];
        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
        $st = "UPDATE mobil SET nama='$nama', brand='$brand', warna='$warna', tipe='$tipe', harga='$harga' WHERE id='$id'";
        // Eksekusi perintah SQL
        $query = mysqli_query($connect, $st);
        // Buatkan kondisi jika eksekusi query berhasil
        if(!$query){
            echo "<script>alert('Data berhasil diupdate')</script>";
        }
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        else{
            echo "<script>alert('Data gagal diupdate')</script>" . mysqli_error($connect);
        }
    }
    // Panggil fungsi update dengan data yang sesuai
    update($id, $nama, $brand, $warna, $tipe, $harga);
// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($connect);
?>