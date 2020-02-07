<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Connexion</title>
</head>

<body>
  <?= isset($err) ? "<span class=\"error\">$err</span>" : "" ?>
  <form action="/connexion" method="post">
    <input type="text" name="email" id="mail-input" placeholder="Email">
    <input type="password" name="password" id="password-input" placeholder="Mot de passe">
    <input type="submit" name="submit" value="Valider">
  </form>
  <span>Toujours pas de compte ? <a href="/inscription">Inscrivez-vous</a></span>
</body>

</html>