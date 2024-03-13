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
                    <th>Cena brutto</th>
                </tr>
                <tr>
                    <td><img src="produkty/cake.jpg"></td>
                    <td>ciasto czekoladowe</td>
                    <td>ciasto czekoladowe własnej roboty. same zdrowe składniki prosto z gospodarstwa cioci Cecil</td>
                    <td>40zł/brutto</td>
                </tr>
            </table>
            <div class="in">
            <form method="post" action="ciasto.php">
            <label for="ciasto"><p>Ile chcesz kupic?</p></label><input name="ciasto" id="ciasto" type="number"><br>
            <button type="submit" id="cos" name="kosz">Dodaj do kosza</button><br>
            <button type="submit" id="cos1"><a href="sklep.html">Wróc do strony głównej</a></button>
                </form>
            </div>
        </div>
    </main>
    <?php 
                if(isset($_POST['kosz'])){
                    $ciasto = $_POST['ciasto'];
                    $_SESSION['two'] = $ciasto;
                    $rowna2 = $ciasto * 35;
                    $_SESSION["ciasto"] = $rowna2;
                }
            mysqli_close($poloczenie);
            var_dump($_SESSION);
        ?>
    <script src="banner.js"></script>
</body>
</html>