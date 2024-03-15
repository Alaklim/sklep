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

         $pol = mysqli_connect($serwer, $uz, $haslo, $baza);
         error_reporting(0);
    ?>
    <header>
        <div class=banner>
            <img src="banner1.png" id="ban" class="active">
            <img src="banner2.png" id="ban">
           </div>
    </header>
    <main>
        <div class="prom">
            <h1></h1>
            <?php
            if(isset($_POST['button']) != 0){
            echo "<table cellpadding='5' rules='all'>
                <tr>
                    <th>Zdjęcie produktu</th>
                    <th>Produkt</th>
                    <th>Opis</th>
                    <th>Cena brutto</th>
                </tr>
                    ";
    
                    $ide = $_POST['button'] + 1;
                    
                $wynik = mysqli_query($pol, "SELECT * FROM produkty WHERE id=$ide");
                while($r = mysqli_fetch_array($wynik)){
                echo "<tr>
                    <td><img style width='140' height='70' src='data:image/png;base64," . base64_encode($r['obraz']) . "' /></td>
                    <td>{$r['nazwaPr']}</td>
                    <td>{$r['opis']}</td>
                    <td>{$r['koszt']}</td>
                </tr>
            </table>";

                    $mamona = $r['monay'];
                    $_SESSION['monka'] = $mamona;
                    $nazwa = $r['nazwaPr'];
                    $_SESSION['nazwa'] = $nazwa;
                };
            $_SESSION['ide'] = $ide;
            ?>
            <div class="in">
            <form method="post" action="prod.php">
            <label for="ciasto"><p>Ile chcesz kupic?</p></label><input name="ciasto" id="ciasto" type="number"><br>
            <label for="cos"></label><button type="submit" id="cos" name="cos">Dodaj do kosza</button><br>
            <label for="cos1"></label><button type="submit" id="cos1" name="cos1"><a href="sklep.php">Wróc do strony głównej</a></button>
                </form>
            </div>
        </div>
    </main>
    <?php 
                
                
                    }else{
                        $cika = $_POST['ciasto'];
                        $mamona = $_SESSION['monka'] ;
                        $mok = $cika * $mamona;

                        $_SESSION['pomidorek'];
                        $_SESSION['ciastko'];
                        $_SESSION['marek'];
    
                        if($_SESSION['ide'] == 1){
                            $_SESSION['pomidorek'] = $cika;
                            $_SESSION['one'] = $mok;
                        }
                        else if($_SESSION['ide'] == 2){
                            $_SESSION['ciastko'] = $cika;
                            $_SESSION['two'] = $mok;
                        }
                        else if($_SESSION['ide'] == 3){
                            $_SESSION['marek'] = $cika;
                            $_SESSION['tree'] = $mok;
                        }
                        echo "ZAAKCEPTOWANE<br>";
                        echo "<form action='kosz.php' method='post'><label for='kk'></label><button id='cos' name='kk' type='submit'>idz do koszyka</button></form><br>";
                        echo "<form action='sklep.php' method='post'><label for='ko'></label><button id='cos' name='ko' type='submit'>wróć do strony głównej</button></form>";
                    }
        ?>
    <script src="banner.js"></script>
</body>
</html>