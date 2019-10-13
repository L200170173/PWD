<?php
    $conn = mysqli_connect('localhost', 'root', 'D4rk-fredianto', 'Informatika');
    $kode = $_GET['kode_gudang'];
    $hapus = "DELETE FROM Gudang WHERE kode_gudang='$kode'";
    $data = mysqli_query($conn, $hapus);
    
    if($data > 0){
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href='gdgform.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href='gdgform.php';
            </script>
        ";
    }
?>
