<?php
    $conn = mysqli_connect('localhost', 'root', 'D4rk-fredianto', 'Informatika');
    $kode = $_GET['kode_gudang'];
    $cari = "SELECT * FROM Gudang WHERE kode_gudang = '$kode'";
    $hasil_cari = mysqli_query($conn, $cari);
    $data = mysqli_fetch_array($hasil_cari);

//     function active_radio_button($value, $input){
//         $result = $value==$input?'checked':'';
//         return $result;
//     }
    if($data>0){
?>
    <html>
        <head><title>Data Gudang</title></head>
        <body>
            <h3>Form Gudang</h3>
            <table>
                <form method='POST' action='gdgubah.php'>
                    <tr>
                        <td>Kode</td>
                        <td>:</td>
                        <td>
                            <input type='text' name='kode' size='10' value='<?php echo $data['kode_gudang']?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Gudang</td>
                        <td>:</td>
                        <td>
                            <input type='text' name='nama' size='30' value='<?=$data['nama_gudang']?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>Lokasi</td>
                        <td>:</td>
                        <td>
                            <input type='text' name='lokasi' size='40' value='<?=$data['lokasi']?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type='submit' name='submit' value='Ubah'/>
                        </td>
                    </tr>
                </form>
            </table>
        <?php
            }
        ?>
        <?php
            error_reporting(E_ALL^E_NOTICE);
            $kode=$_POST['kode'];
            $nama=$_POST['nama'];
            $lokasi=$_POST['lokasi'];
            $submit=$_POST['submit'];
            $ubah="UPDATE Gudang SET kode_gudang='$kode', nama_gudang='$nama', lokasi='$lokasi' WHERE kode_gudang='$kode'";
            if($submit){
                if($kode==''){
                    echo "Kode tidak boleh kosong!";
                }
                elseif($nama==''){
                    echo "Nama tidak boleh kosong!";
                }
                elseif($lokasi==''){
                    echo "Lokasi tidak boleh kosong!";
                }
                else{
                    mysqli_query($conn, $ubah);
                    echo "
                        <script>
                            alert('Data berhasil diubah!');
                            document.location.href='gdgform.php';
                        </script>
                    ";
                }
            }
        ?>
        </body>
    </html>
