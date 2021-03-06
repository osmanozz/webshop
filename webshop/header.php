<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link rel="stylesheet" href="css/webshop.css"/>
    <script>
        function uitloggen() {
            var loguit = confirm('Weet u zeker dat u wilt uitloogen?');
            if(loguit) {
                location.href='index.php?page=uitloggen';
            }
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="icon_container">
        <div class="icon">&#x266C;</div>
        </div>

        <?php
        if(isset($SESSION["ID"]) &&
        $SESSION["STATUS"] == "ACTIEF") {
            if($SESSION["ROL"] == 0 ) {
                ?>
        
                <div class="user">
                    <p id="user">Gebruiker:
                        <?php echo $_SESSION["USER_NAAM"]; ?>
                    </p>        
                    </div>

                    <div class="nav">
                        <ul>
                            <li onclick="location.href='index.php?page=profile_edit'">
                                Profiel </li>
                            <li onclick="location.href='index.php?page=webshop'">
                                Webshop</li>
                                <li onclick="uitloggen()">Uitloggen</li> 
                                </ul>
                                </div>
                                
                                <?php 
                            } elseif($_SESSION["ROL"] == 1) {
                                ?>

                    <div class="user">
                        <p id="user">Administrator:
                        <?php echo $_SESSION["USER_NAAM"]; ?> </p>
                        </div>

                        <div class="nav-admin">
                            <ul>
                                <li onclick="location.href='index.php>page=Albums'">
                                Albums</li>
                                <li onclick="location.href='index.php>page=Klanten'">
                                    Klanten</li>
                                    <li onclick="location.href='index.php>page=Weborder'">
                                        Weborder</li>
                                        <li onclick="location.href='index.php>page=Rapporten'">
                                            Rapporten</li>
                                            <li onclick="uitloggen()">Uitloggen</li>
                                            </ul>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                  </div>
                                  </body>
                                  </html>
                                  
