<?php
    include '../Functions/main_functions.php';
    include '../Assets/layout.php';

$groep = new User($mysqli);

$groepen = $groep->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/main.css">
    <title>Registreren</title>
</head>
<body>
    <div class="container">
            <form name="Registreren" style="margin: auto; width: 400px;" method="POST" action="registreren.php" autocomplete="off">
                <div class="mb-3">
                    <label for="VoorbeeldVoornaam1" class="form-label">Voornaam</label>
                    <input type="Text" name="Voornaam" class="form-control" aria-describedby="VoornaamHelp" required>
                </div>
                <div class="mb-3">
                    <label for="VoorbeeldAchternaam1" class="form-label">Achternaam</label>
                    <input type="Text" name="Achternaam" class="form-control" aria-describedby="AchternaamHelp" required>
                </div>
                <div class="dropdown mb-3">
                    <label for="VoorbeeldGroep1" class="form-label">Kies je groep</label><br />
                        <select name="select" class="form-select form-control mb-3" aria-label=".form-select-lg example">
                            <?php
                                foreach ($groepen as $optie) {
                                echo '<option value="' . $optie['ID'] . '">' . "Groep " . $optie['Groep'] . '</option>';
                                }
                            ?>
                        </select>
                </div>
                    <button type="submit" name="Registreer" class="btn btn-primary">Registreer</button>
            </form>
    </div>
</body>
</html>