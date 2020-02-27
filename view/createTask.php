<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Créer une liste de tâches</title>
</head>

<body>
  <h1>Créez votre liste :</h1>
  <?= isset($err) ? "<span class=\"error\">" . print_r($err, true) . "</span>" : "" ?>
  <form  method="post">
    Nom <input type="text" name="nom" id="" placeholder="Liste"><br>
    Date de début <input type="text" name="datedebut" id="" placeholder=
    "<?php
    date_default_timezone_set('UTC');
    echo date("d/m/y"); ?>"><br>
    Date de fin<input type="text" name="datefin" id="" placeholder="<?php
    date_default_timezone_set('UTC');
    echo date("d/m/y"); ?>"><br>
    Membres<input type="text" name="membres" id="" placeholder="Jean"><br>
    
  </form>
  <button type="button"> Confirmer </button>
  <button type="button"> Annuler </button>
</body>

</html>
