<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kosz.css">
    <link rel="shortcut icon" href="icon-xd.png">
    <title>Koszyk</title>
</head>
<body>
<?php 
         $serwer = 'localhost';
         $uz = 'root';
         $haslo = '';
         $baza = 'sklep'; 

         $poloczenie = mysqli_connect($serwer, $uz, $haslo, $baza);
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
            <h1>Koszyk</h1>
            
            <p>Zawartość kosza:</p>
                <?php 

                  $pom = $_SESSION['pomidorek'];
                  $cak = $_SESSION['ciastko'];
                  $mark = $_SESSION['marek'];

                  $one = $_SESSION['one'];
                  $two = $_SESSION['two'];
                  $tree = $_SESSION['tree'];

                 #echo "pomidor ". $pom."<br>";
                 #echo "ciasto ".$cak."<br>";
                 #echo "marchewka ".$mark."<br>";
                
                #$pom = $_SESSION['pomidorek'];

                #$one = $_SESSION['one'];
                
                #echo "jeden ".$pom."<br>";
                #echo "trzert ".$one."<br>";



                    echo "<p>Pomidory: ".$pom. " za ". $one." zł</p>";
                    echo "<p>Ciasta: ".$cak. " za " .$two. " zł</p>";
                    echo "<p>marchewki: ".$mark." za ". $tree." zł</p>";
            
                $koszt = $one + $two + $tree;
                echo "<p>Koszt: ". $koszt. " zł</p>";
                    #echo $mar." ". $ciasto." ". $pom;

                    
                ?>
            <form method="post" action="kosz.php">
                <label for="imie">Podaj imie odbiorcy:</label><input type="text" name="imie" id="imie"><br>
                <button type="submit" name="kup" >Kup</button>
                <button ><a href="sklep.php">wróć do strony głównej</a></button>
            </form>
        </div>
    </main>
    <?php 
            if(isset($_POST["kup"])){
                $imie = $_POST['imie'];
                mysqli_query($poloczenie, "INSERT INTO koszyk (imie, kasa) VALUES ('$imie', '$koszt') ");
            }
            mysqli_close($poloczenie);
            var_dump($_SESSION); 
        ?>
    <script src="banner.js"></script>
</body>
</html>