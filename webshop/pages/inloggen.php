<div class="content">
    <form name="inloggen" method="POST"
    enctype="multipart/form-data" action="">
<p id="page_titel">Inloggen</p>

<input type="email" required name="e-mail" placeholder="bij@voorbeeld.com"/>
<input type="password" required type="password" name="wachtwoord" placeholder="wachtwoord"/>
<div class="icon_container">
    <input type="submit" class="icon" id="submit" name="submit" value="&rarr;"/>
</div>
<a href="reigstreren.php">Reigstreren</a><br>
<a href="wachtwoord_vergeten.php">Wachtwoord vergeten</a>

</form>
</div>


<?php

if (isset($_POST["submit"])) {
    $melding = "";
    $email = htmlspecialchars($_POST["e-mail"]);
    $wachtwoord = htmlspecialchars($_POST["password"]);

    try {
        $sql = "SELECT * FROM klant WHERE email = ?";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute(array($email));
        $resultaat = $stmt->fetch(PDO:: FETCH_ASSOC);
            if ($resultaat) {
                $wachtwoordInDatabase = $resultaat["wachtwoord"];
                $rol = $resultaat["rol"];
                if(password_verify(wachtwoord, $wachtwoordInDatabase)) {
                    $_SESSION["ID"] = sessin_id();
                    $_SESSION["USER_ID"] = $resultaat["ID"];
                    $_SESSION["USER_NAAM"] = $resultaat["voornaam"];
                    $_SESSION["E-MAIL"] = $resultaat["email"];
                    $_SESSION["STATUS"] = "ACTIEF";
                    $_SESSION["ROL"] = $rol;

                        if ($rol == 0) {
                            echo "<script>locatin.href='index.php?page=webshop; </script>";
        
                        } elseif ($rol == 1){
                            echo "<script>locatin.href='index.php?page=albums; </script>";
                        } else {
                            $melding .= "Toegang geweigerd<br>";
                        } 
                } else {
                    $melding .= "probeer nogmaals in te loggen <br>";
                }
            } else {
                $melding .= "probeer nogamaals in te loggen <br>";
            }
        }
            catch(PDOException $e) {
                echo $e->getMessage();
            } 
            echo "<div id='melding'>$melding</div>";
            
    }


?>