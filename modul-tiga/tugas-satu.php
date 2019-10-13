<html>
<head>
    <title>Penjumlahan</title>
</head>
<body>
<form method="POST" action="penjumlahan.php">
            <p>Nilai A adalah : <input type="text" name="A" size="3"></p>
            <p>Nilai B adalah : <input type="text" name="B" size="3"></p>
            <p><input type="submit" name="submit" value="jumlahkan"></p>
        </form>

        <?php
        error_reporting (E_ALL ^ E_NOTICE);
        $A = $_POST['A'];
        $B = $_POST['B'];
        $submit = $_POST['submit'];
        $jumlah = $A+$B;
        if($submit){
            echo "</br>Nilai A adalah $A";
            echo "</br>Nilai B adalah $B";
            echo "</br>jadi nilai A ditambah nilai B adalah $jumlah";
        }
        ?>  
</form>
<body>
</html>