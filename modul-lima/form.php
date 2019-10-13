<html>
    <head><title>Data Mahasiswa</title></head>

    <?php
        $conn = mysqli_connect('localhost', 'root', 'D4rk-fredianto', 'Informatika');
    ?>

    <body>
        <center>
            <h3>Masukkan Data Mahasiswa</h3>
            <table>
                <form method='POST' action='form.php'>
                    <tr>
                        <td width='25%'>NIM</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <input type='text' name='nim' size='10'/>
                        </td>
                    </tr>
                    <tr>
                        <td width='25%'>Nama</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <input type='text' name='nama' size='30'/>
                        </td>
                    </tr>
                    <tr>
                        <td width='25%'>Kelas</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <input type='radio' value='A' checked name='kelas'/>A
                            <input type='radio' value='B' name='kelas'/>B
                            <input type='radio' value='C' name='kelas'/>C
                        </td>
                    </tr>
                    <tr>
                        <td width='25%'>Alamat</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                            <input type='text' name='alamat' size='40'/>
                        </td>
                    </tr>
                    <input type='submit' value='Masukkan' name='submit'/>
                </form>
            </table>

            <?php
                error_reporting(E_ALL^E_NOTICE);

                $nim=$_POST['nim'];
                $nama=$_POST['nama'];
                $kelas=$_POST['kelas'];
                $alamat=$_POST['alamat'];
                $submit=$_POST['submit'];
                $input="INSERT INTO Mahasiswa (NIM, Nama, Kelas, Alamat) VALUES ('$nim', '$nama', '$kelas', '$alamat')";

                if($submit){
                    if($nim==''){
                        echo "</br>NIM tidak boleh kosong!";
                    }
                    elseif($nama==''){
                        echo "</br>Nama tidak boleh kosong!";
                    }
                    elseif($alamat==''){
                        echo "</br>Alamat tidak boleh kosong!";
                    }
                    else{
                        mysqli_query($conn, $input);
                        echo "</br>Data berhasil dimasukkan!";
                    }
                }
            ?>
            </hr>
            <h3>Data Mahasiswa</h3>
            <table border='1' width='50%'>
                <tr>
                    <td align='center' width='20%'><b>NIM</b></td>
                    <td align='center' width='30%'><b>Nama</b></td>
                    <td align='center' width='10%'><b>Kelas</b></td>
                    <td align='center' width='30%'><b>Alamat</b></td>
                </tr>

                <?php
                    $cari="SELECT * fROM Mahasiswa ORDER BY NIM";
                    $hasil_cari=mysqli_query($conn, $cari);

                    while($data=mysqli_fetch_row($hasil_cari)){
                        echo "
                            <tr>
                                <td>$data[0]</td>
                                <td>$data[1]</td>
                                <td>$data[2]</td>
                                <td>$data[3]</td>
                                <td><a href='ubah.php?NIM=$data[0]'>Ubah</a></td>
                            </tr>
                        ";
                    }
                ?>
            </table>
        </center>
    </body>
</html>
