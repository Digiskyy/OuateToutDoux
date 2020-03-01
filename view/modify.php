<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profil</title>
</head>

<body>
  <h1>Modifiez votre profil :</h1>
  <?= isset($err) ? "<span class=\"error\">" . print_r($err, true) . "</span>" : "" ?>
  <form action="/inscription" method="post">
    <input type="text" name="mail" id="" placeholder="Email"><br>
    <input type="text" name="firstname" id="" placeholder="Prénom"><br>
    <input type="text" name="lastname" id="" placeholder="Nom de famille"><br>
    <input type="number" name="age" id="" placeholder="Age"><br>
    <input type="tel" name="phone" id="" placeholder="Téléphone"><br>
    <input type="radio" name="sex" id="radio-homme" checked>
    <label for="radio-homme"> Homme </label>
    <input type="radio" name="sex" id="radio-femme">
    <label for="radio-femme"> Femme </label><br>
    <input type="password" name="password" id="" , placeholder="Mot de passe actuel"><br>
    <input type="password" name="password2" id="" , placeholder="Nouveau mot de passe"><br>
    <input type="password" name="password2" id="" , placeholder="Verifiez mot de passe"><br>
    <input type="submit" name="submit" value="Valider"><br>
  </form>
</body>

</html>
