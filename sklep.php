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
    <title>Sporzywczak u wróżki Cecyli</title>
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
        <h1>Produkty Na przecenie</h1>
        <button><a href="#prod">Przejdz na produkty</a></button>
        <button><a href="kosz.php">Przejdz do koszyka</a></button>
        <table cellpadding="5" rules="all">
            <tr>
                <th>Zdjęcie produktu</th>
                <th>Produkt</th>
                <th>Opis</th>
                <th>Cena brutto</th>
                <th>Zobacz wiecej</th>
            </tr>
            <?php 
            $wyszek = mysqli_query($poloczenie, "SELECT * FROM produkty");
            for($r = 0; $r < $wyk = mysqli_fetch_array($wyszek); $r++){
            echo"<tr>
                <td><img style width='140' height='70' src='data:image/png;base64," . base64_encode($wyk['obraz']) . "' /></td>
                <td>{$wyk['nazwaPr']}</td>
                <td>{$wyk['opis']}</td>
                <td>{$wyk['koszt']}</td>";
                $_SESSION['d'] = $r;
                echo "<td><form method='post' action='prod.php'><button type='submit' name='button' value='{$r}'>Zobacz</button></form></td>
            </tr>";
            }
            ?>
        </table>
    </div>
    <div id="products"><a name="prod"></a>
    <h1>Produkty</h1>
    <table cellpadding="5" rules="all">
        <tr>
            <th>Zdjęcie produktu</th>
            <th>Produkt</th>
            <th>Opis</th>
            <th>Cena brutto</th>
            <th>Zobacz wiecej</th>
        </tr>
        <tr>
            <td><img src="produkty/wrozenie-kart.jpg"></td>
            <td>Wróżenie z Kart Tarota</td>
            <td>Możesz wykupić wróżenie z kart</td>
            <td>za 30min - 170zł/brutto</td>
            <td><button><a href="wrozka.html">Zobacz</a></button></td>
        </tr>
        <tr>
            <td><img src="produkty/ogorek.jpg"></td>
            <td>ogórki</td>
            <td>Swierze ogórasy, na stanie mamy ich: </td>
            <td>za 1kg - 15zł/brutto</td>
            <td><button><a>Zobacz</a></button></td>
        </tr>
        <tr>
            <td><img src="produkty/lody.jpg"></td>
            <td>Lody śmietankowe/czekoladowe/truskawkowe</td>
            <td>Lody, na stanie mamy ich: </td>
            <td>1 pudełko za 15zł/brutto</td>
            <td><button><a>Zobacz</a></button></td>
        </tr>
        <tr>
            <td><img src="produkty/mleko.jpg"></td>
            <td>Mleko prosto od krowy</td>
            <td>świerze mleko, na stanie mamy ich</td>
            <td>1,5L - 10zł/brutto</td>
            <td><button><a>Zobacz</a></button></td>
        </tr>
    </table>
    </div>
    </main>
    <?php 
        
        mysqli_close($poloczenie);
            var_dump($_SESSION);
    ?>
    <script src="banner.js"></script>
</body>
</html>