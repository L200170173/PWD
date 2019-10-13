<html>
    <head><title>Gudang</title></head>

    <?php
        $conn = mysqli_connect('localhost', 'root', 'D4rk-fredianto', 'Informatika');
    ?>

    <body>
        <center>
            <h3>Masukkan Data Gudang</h3>
            <table>
                <form method='POST' action='gdgform.php'>
                    <tr>
                        <td width='25%'>Kode Gudang</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <input type='text' name='kode' size='10'/>
                        </td>
                    </tr>
                    <tr>
                        <td width='25%'>Nama Gudang</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <input type='text' name='nama' size='30'/>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td width='25%'>Lokasi</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <input type='text' name='lokasi' size='40'/>
                        </td>
                    </tr>
                    <tr>
                        <td><input type='submit' value='Masukkan' name='submit'/></td>
                    </tr>
                </form>
            </table>

            <?php
                error_reporting(E_ALL^E_NOTICE);

                $kode=$_POST['kode'];
                $nama=$_POST['nama'];
                $lokasi=$_POST['lokasi'];
                $submit=$_POST['submit'];
                $input="INSERT INTO Gudang (kode_gudang, nama_gudang, lokasi) VALUES ('$kode', '$nama', '$lokasi')";

                if($submit){
                    if($kode==''){
                        echo "</br>Kode tidak boleh kosong!";
                    }
                    elseif($nama==''){
                        echo "</br>Nama tidak boleh kosong!";
                    }
                    elseif($lokasi==''){
                        echo "</br>Lokasi tidak boleh kosong!";
                    }
                    else{
                        mysqli_query($conn, $input);
                        echo "</br>Data berhasil dimasukkan!";
                    }
                }
            ?>
            </hr>
            <h3>Data Gudang</h3>
            <table border='1' width='50%'>
                <tr>
                    <td align='center' width='10%'><b>Kode</b></td>
                    <td align='center' width='40%'><b>Nama Gudang</b></td>
                    <td align='center' width='50%'><b>Lokasi</b></td>
                </tr>

                <?php
                    $cari="SELECT * fROM Gudang ORDER BY kode_gudang";
                    $hasil_cari=mysqli_query($conn, $cari);

                    while($data=mysqli_fetch_row($hasil_cari)){
                        echo "
                            <tr>
                                <td>$data[0]</td>
                                <td>$data[1]</td>
                                <td>$data[2]</td>
                                <td><a href='gdgubah.php?kode_gudang=$data[0]'>Ubah</a></td>
                                <td><a href='gdghapus.php?kode_gudang=$data[0]'>Hapus</a></td>
                            </tr>
                        ";
                    }
                ?>
            </table>
        </center>
    </body>
</html>
