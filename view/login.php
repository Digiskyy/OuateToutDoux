<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Connexion</title>

  <!-- css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700" />
  <link rel="stylesheet" href="css/Header-Dark.compiled.css" />
  <link rel="stylesheet" href="css/Login-Form-Clean.css" />
  <link rel="stylesheet" href="css/Registration-Form-with-Photo.compiled.css" />

</head>

<body style="background-color: #f8ca9c;">
  <?= isset($err) ? "<span class=\"error\">$err</span>" : "" ?>
  <div class="login-clean" style="background-color: #f8ca9c;">
    <form class="shadow" style="background-color: #f6b99c;" action="/connexion" method="post">
      <div class="illustration"><img src="img/logo.svg" style="width: 100px;" /></div>
      <div class="form-group"><input type="email" class="rouded-0 form-control" name="email" placeholder="Email" style="background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;" /></div>
      <div class="form-group"><input type="password" class="rouded-0 form-control" name="password" placeholder="Mot de passe" style="background-color: #f8ca9c;margin-top: 5%;border-color: #908175;border-style: solid;border-width: 0.3vh;" /></div>
      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #908175;">Se connecter</button>
      <span class="forgot" style="margin-top: 5%;">Toujours pas de compte ? <a href="/inscription">Inscrivez-vous.</a></span>
    </form>
  </div>
</body>

</html>