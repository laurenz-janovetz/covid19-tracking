<?php
error_reporting(E_ALL);
ini_set('display_errors', 'off');
/**
 * Eingabe
 */
$name = '';
$adress = '';
$phone = '';
$date = '';
$time = '';
$desk = '';
$isRobot = false;
$isPostRequest =  $_SERVER['REQUEST_METHOD'] === 'POST';
$errors =[];
/**
 * Verarbeitung
 */
if($isPostRequest){
    $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
    $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone');
    $date = filter_input(INPUT_POST, 'date');
    $time = filter_input(INPUT_POST, 'time');
    $desk = filter_input(INPUT_POST, 'desk');
    $isRobot = filter_input(INPUT_POST, 'robot') === 'on';

    if(!$name){
        $errors[] = 'Name ist leer';
    }
    if (!$adress) {
        $errors[] = 'Bitte eine Adresse hinterlassen';
    }
    if (!$phone) {
        $errors[] = 'Bitte eine Telefonnummer hinterlassen';
    }
    if (!$date) {
        $errors[] = 'Bitte ein Datum auswählen';
    }
    if (!$time) {
        $errors[] = 'Bitte eine Uhrzeit auswählen';
    } }
        $data = [
            'Name' => $name,
            'Adresse' => $adress,
            'Telefon' => $phone,
            'Datum' => $date,
            'Uhrzeit' => $time,
            'Tisch' => $desk,
        ];


            $pdo = new PDO('mysql:host=127.0.0.1;dbname=guest', 'guest', 'password');
            $statement = $pdo->prepare("INSERT INTO guest (name, adress, phone, date, time, desk) VALUES (?, ?, ?, ?, ?, ?)");
            $statement->execute(array($_POST['name'],$_POST['adress'],$_POST['phone'],$_POST['date'],$_POST['time'],$_POST['desk']));

        $_POST = [];
        $mrIsSelected = false;
        $mrsIsSelected = false;
        $subject = null;
        $isRobot = false;
        $name = '';
        $message = '';



/**
 * Ausgabe
 */
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>COVID-19 GÄSTEREGISTRIERUNG</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<header class="jumbotron">
    <div class="container">
      <h1 class="display-4">COVID-19 GÄSTEREGISTRIERUNG</h1>
      <p class="lead">Aufgrund der Aktuellen Corona Schutzmaßnahmen ist es notwendig Ihre daten zu erfassen</p>
    </div>
</header>
<?php if($isPostRequest):?>
<section class="container" id="alets">
    <?php if(count($errors) === 0):?>
    <div class="alert alert-success" role="alert">
        Anfrage versendet!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif;?>
    <?php if(count($errors) > 0):?>
    <div class="alert alert-danger" role="alert">
        Fehler beim versenden der Anfrage
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php foreach($errors as $errorMessage):?>
            <p><?= $errorMessage ?></p>
        <?php endforeach;?>
    </div>
    <?php endif;?>
</section>
<?php endif;?>
<section class="container" id="contactForm">
    <form method="post">
    <div class="card">
        <div class="card-header">
            Formular
        </div>
        <div class="card-body">
                <div class="row form-group">
                    <label class="col-2 col-form-label" for="name">
                        Name:
                    </label>
                    <div class="col">
                        <input type="text" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" name="name" id="name" placeholder="Name" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-2 col-form-label" for="adress">
                        Anschrift:
                    </label>
                    <div class="col">
                        <input type="text" value="<?= htmlspecialchars($adress, ENT_QUOTES, 'UTF-8') ?>" name="adress" id="adress" placeholder="Adresse" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-2 col-form-label" for="phone">
                        Telefonnummer:
                    </label>
                    <div class="col">
                        <input type="tel" value="<?= htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') ?>" name="phone" id="phone" placeholder="+43 000 00000000" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-2 col-form-label" for="name">
                        Datum:
                    </label>
                    <div class="col">
                        <input type="date" value="<?= htmlspecialchars($date, ENT_QUOTES, 'UTF-8') ?>" name="date" id="date" placeholder="Datum" class="form-control">
                    </div>
                </div>
                    <div class="row form-group">
                        <label class="col-2 col-form-label" for="name">
                            Uhrzeit:
                        </label>
                        <div class="col">
                            <input type="time" value="<?= htmlspecialchars($time, ENT_QUOTES, 'UTF-8') ?>" name="time" id="time" placeholder="Uhrzeit" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-2 col-form-label" for="desk">
                            Tischnummer:
                        </label>
                        <div class="col">
                            <input type="number" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>" name="desk" id="desk" placeholder="Tischnummer" class="form-control">
                        </div>
                    </div
                <div class="row form-check">
                    <div class="offset-2 col">
                        <input type="checkbox" name="robot" id="robot" class="form-check-input"<?= $isRobot ? ' checked' : '' ?>
                        <label for="robot" class="form-check-label">Hiermit bestätige ich, dass ich mit der angegebenen <a href="#">Datenschutzerklärung</a> einverstanden bin.</label>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Formular senden</button>
        </div>
        </form>
    </div>
    <!--ANFANG    !ACHTUNG DIESER TEIL MUSS IM QUELLCODE BLEIBEN, ANSONSTEN WIRD DIE LIZENZVEREINBARUNG, LAUT GITHUB NICHT EINGEHELTEN!-->
    <div class="footer fixed-bottom">
        by Lukas Dallhammer <a href="https://github.com/lukas-dallhammer">Github</a>
    </div>
    <!--ENDE      !ACHTUNG DIESER TEIL MUSS IM QUELLCODE BLEIBEN, ANSONSTEN WIRD DIE LIZENZVEREINBARUNG, LAUT GITHUB NICHT EINGEHELTEN!-->
</section>
</body>
</html>
