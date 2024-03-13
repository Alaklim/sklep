<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sklep.css">
    <link rel="shortcut icon" href="icon-xd.png">
    <title>Pomidorki Cecil</title>
</head>
<body>
<?php 
         $serwer = 'localhost';
         $uz = 'root';
         $haslo = '';
         $baza = 'sklep'; 

         $poloczenie = mysqli_connect($serwer, $uz, $haslo, $baza);
    ?>
    <header>
        <div class=banner>
            <img src="banner1.png" id="ban" class="active">
            <img src="banner2.png" id="ban">
           </div>
    </header>
    <main>
        <div class="prom">
            <h1>Pomidory, prosto z ogrodu</h1>
            <table cellpadding="5" rules="all">
                <tr>
                    <th>Zdjęcie produktu</th>
                    <th>Produkt</th>
                    <th>Opis</th>
                    <th>ile na stanie</th>
                    <th>Cena brutto</th>
                </tr>
                <tr>
                    <td><img src="produkty/marchewki.jpg"></td>
                    <td>Marchewki</td>
                    <td>Marchewki z ogrótka cioci Cecyli, bez żadnych chemikali. trzymane zdala od robaków. Słodziusie, idealne do ciast</td>
                    <td></td>
                    <td>za 1sz - 4zł/brutto</td>
                </tr>
            </table>
            <div class="in">
            <form method="post" action="marchewy.php">
            <label for="mar"><p>Ile chcesz kupic?</p></label><input name="mar" id="mar" type="number"><br>
            <button type="submit" id="cos" name="kosz">Dodaj do kosza</button><br>
            <button type="submit" id="cos1"><a href="sklep.html">Wróc do strony głównej</a></button>
</form>
            </div>
        </div>
    </main>
    <?php 
                if(isset($_POST['kosz'])){
                    $mar = $_POST['mar'];
                    $_SESSION['tree'] = $mar;
                    $rowna3 = $mar * 2;
                    $_SESSION["mar"] = $rowna3;
    
                }
            mysqli_close($poloczenie);
            var_dump($_SESSION);
        ?>
    <script src="banner.js"></script>
</body>
</html>