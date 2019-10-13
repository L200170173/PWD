<?php
    $conn = mysqli_connect('localhost', 'root', 'D4rk-fredianto', 'Informatika');
    $nim = $_GET['NIM'];
    $cari = "SELECT * FROM Mahasiswa WHERE NIM = '$nim'";
    $hasil_cari = mysqli_query($conn, $cari);
    $data = mysqli_fetch_array($hasil_cari);

    function active_radio_button($value, $input){
        $result = $value==$input?'checked':'';
        return $result;
    }
    if($data>0){
?>
    <html>
        <head><title>Data Mahasiswa</title></head>
        <body>
            <h3>Form Mahasiswa</h3>
            <table>
                <form method='POST' action='ubah.php'>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td>
                            <input type='text' name='nim' size='10' value='<?php echo $data['NIM']?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                            <input type='text' name='nama' size='30' value='<?=$data['Nama']?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td>
                            <input type='radio' value='A' name='kelas' <?php echo active_radio_button('A', 
$data['Kelas'])?>/>A
                            <input type='radio' value='B' name='kelas' <?php echo active_radio_button('B', 
$data['Kelas'])?>/>B
                            <input type='radio' value='C' name='kelas' <?php echo active_radio_button('C', 
$data['Kelas'])?>/>C
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                            <input type='text' name='alamat' size='40' value='<?=$data['Alamat']?>'/>
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
            $nim=$_POST['nim'];
            $nama=$_POST['nama'];
            $kelas=$_POST['kelas'];
            $alamat=$_POST['alamat'];
            $submit=$_POST['submit'];
            $ubah="UPDATE Mahasiswa SET NIM='$nim', Nama='$nama', Kelas='$kelas', Alamat='$alamat' WHERE nim='$nim'";
            if($submit){
                if($nim==''){
                    echo "NIM tidak boleh kosong!";
                }
                elseif($nama==''){
                    echo "Nama tidak boleh kosong!";
                }
                elseif($alamat==''){
                    echo "Alamat tidak boleh kosong!";
                }
                else{
                    mysqli_query($conn, $ubah);
                    echo "
                        <script>
                            alert('Data berhasil diubah!');
                            document.location.href='form.php';
                        </script>
                    ";
                }
            }
        ?>
        </body>
    </html>
