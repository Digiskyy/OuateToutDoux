<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inscription</title>
</head>

<body>
  <h1>Inscrivez-vous:</h1>
  <?= isset($err) ? "<span class=\"error\">$err</span>" : "" ?>
  <form action="/inscription" method="post">
    <input type="text" name="pseudo" id="" placeholder="Pseudo">
    <input type="text" name="email" id="" placeholder="Email">
    <input type="password" name="password" id="" , placeholder="Mot de passe">
    <input type="password" name="valid-password" id="" , placeholder="Verifiez mot de passe">
    <input type="submit" name="submit" value="Valider">
  </form>
  <span>Déjà inscrit ? <a href="/connexion">Connectez-vous</a></span>

</body>

</html>