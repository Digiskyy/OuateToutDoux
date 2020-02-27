<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inscription</title>

  <!-- css -->
  <link rel="stylesheet" href="view/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700" />
  <link rel="stylesheet" href="view/css/Header-Dark.compiled.css" />
  <link rel="stylesheet" href="view/css/Registration-Form-with-Photo.compiled.css" />

</head>

<body style="background-color: #f8ca9c;">
  <?= isset($err) ? "<span class=\"error\">$err</span>" : "" ?>
  <div class="register-photo" style="background-color: #f8ca9c;">
    <div class="form-container">
      <div class="image-holder" style="background-image: url('view/img/logo2.svg'); background-color: #ffb794;"></div>
        <form class="shadow-lg" method="post" style="background-color: #f6b99c;" action="/inscription">
          <h2 class="text-center">Inscrivez-vous :</h2>
          <div class="form-group">
            <input type="text" class="rouded-0 form-control" id="field" name="pseudo" placeholder="Pseudo" style="background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;" />
          </div>
          <div class="form-group">
            <input type="text" class="rouded-0 form-control" id="field" name="last-name" placeholder="Nom" style="background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;margin-top: 5%;" />
          </div>
          <div class="form-group">
            <input type="text" class="rouded-0 form-control" id="field" name="first-name" placeholder="Prénom" style="background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;margin-top: 5%;" />
          </div>
          <div class="form-group">
            <input type="email" class="rouded-0 form-control" id="field" name="email" placeholder="Email" style="background-color: #f8ca9c;margin-top: 5%;border-color: #908175;border-style: solid;border-width: 0.3vh;" />
          </div>
          <div class="form-group">
            <input type="password" class="rouded-0 form-control" id="field" name="password" placeholder="Mot de passe" style="background-color: #f8ca9c;margin-top: 5%;border-color: #908175;border-style: solid;border-width: 0.3vh;" />
          </div>
          <div class="form-group">
            <input type="password" class="rouded-0 form-control" id="field" name="password-repeat" placeholder="Confirmation du mot de passe" style="background-color: #f8ca9c;margin-top: 5%;border-color: #908175;border-style: solid;border-width: 0.3vh;" />
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" style="background-color: #908175;">Valider</button>
          </div>
          <span class="already" style="margin-top: 5%;">Déjà inscrit ? <a href="/connexion">Connectez-vous.</a></span>
        </form>
      </div>
    </div>
  </div>
</body>

</html>