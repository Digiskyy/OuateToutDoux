<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OTD | Connexion</title>
  <link rel="icon" type="image/png" href="view/img/logo.png" />

  <!-- css -->
  <link rel="stylesheet" href="view/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="view/css/Header-Dark.compiled.css" />
  <link rel="stylesheet" href="view/css/Login-Form-Clean.css" />
  <link rel="stylesheet" href="view/css/Registration-Form-with-Photo.compiled.css" />
  <link rel="stylesheet" href="view/css/login.css">

  <!-- JS -->
  <script type = "text/javascript">
    function change_color(field, error)
    {
      if(error)
        field.style.backgroundColor = "#fba"; // Couleur de fond rouge pâle
      else
        field.style.backgroundColor = "";
    }
  </script>

</head>

<body style="background-color: #f8ca9c;">
  <div class="login-clean" style="background-color: #f8ca9c;">
    <form class="shadow" style="background-color: #f6b99c;" action="/connexion" method="post">
      <div class="illustration"><a href="/dashboard"><img src="view/img/logo.svg" style="width: 100px;" /></a></div>
      <div class="form-group"><input type="mail" class="rouded-0 form-control" name="mail" placeholder="Email" style="background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;" /></div>
      <div class="form-group"><input type="password" class="rouded-0 form-control" name="password" placeholder="Mot de passe" style="background-color: #f8ca9c;margin-top: 5%;border-color: #908175;border-style: solid;border-width: 0.3vh;" /></div>
      <?php
        isset($err) ? print('<p class="alert alert-danger" role="alert" style = "font-size: 0.85em;">' . $err . '</p>') : '';
      ?>
      <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color: #908175;">Se connecter</button>
      <span class="forgot" style="margin-top: 5%;">Toujours pas de compte ? <a href="/inscription">Inscrivez-vous.</a></span>
      <span class="forgot" style="margin-top: 5%;font-size:0.7em;"><a href="#">Mot de passe oublié ?</a></span>
    </form>
  </div>
</body>

</html>