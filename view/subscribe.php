<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OTD | Inscription</title>
  <link rel="icon" type="image/png" href="view/img/logo.png" />

  <!-- css -->
  <link rel="stylesheet" href="view/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700" />
  <link rel="stylesheet" href="view/css/Header-Dark.compiled.css" />
  <link rel="stylesheet" href="view/css/Registration-Form-with-Photo.compiled.css" />
  <link rel="stylesheet" href="view/css/subscribe.css">

</head>

<body style="background-color: #f8ca9c;">
  <?= isset($err) ? "<span class=\"error\">$err</span>" : "" ?>
  <div class="register-photo" style="background-color: #f8ca9c;">
    <div class="form-container">
      <div class="image-holder shadow-lg" style="background-image: url('view/img/logo2.svg'); background-color: #ffb794;"></div>
        <form class="shadow-lg" method="post" style="background-color: #f6b99c;" action="/inscription">
          <h2 class="text-center">Inscrivez-vous :</h2>

          <div class="form-group">
            <?php
              $pseudo = (isset($_POST["pseudo"]) && ($_POST["pseudo"] != "")) ? "value=\"" . $_POST["pseudo"] . "\" " : ""; // Enables to rewrite pseudo already typed after reloading
              print('<input type="text" class="rouded-0 form-control" class="field" name="pseudo" placeholder="Pseudo*" ' . $pseudo);
              if($errors["pseudo"] != "") // If pseudo has been typed and error(s) -> Red
              {
                print('style="background-color: #f88; border-color: #f22; border-style: solid; border-width: 0.3vh;"/>');
                print('<div class="alert alert-danger" role="alert" style = "font-size: 0.85em;">' . $errors["pseudo"] . "<br/></div>");
              }
              elseif(isset($_POST["pseudo"]) && ($_POST["pseudo"] != "")) // If pseudo has been typed and no error -> Green
                print('style="background-color: #f8ca9c; border-color: rgb(0, 180, 48); border-style: solid; border-width: 0.3vh;"/>');
              else  // If pseudo has not been typed -> Normal colour
                print('style="background-color: #f8ca9c; border-color: #908175; border-style: solid; border-width: 0.3vh;"/>');
            ?>
          </div>

          <div class="form-group">
            <?php
              $lastname = (isset($_POST["lastname"]) && ($_POST["lastname"] != "")) ? "value=\"" . $_POST["lastname"] . "\" " : ""; // Enables to rewrite pseudo already typed after reloading
              print('<input type="text" class="rouded-0 form-control" class="field" name="lastname" placeholder="Nom" pattern="[A-Za-z- ]*" ' . $lastname .
                      'style="background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;margin-top: 5%;" />');
            ?>
          </div>

          <div class="form-group">
            
            <?php
              $firstname = (isset($_POST["firstname"]) && ($_POST["firstname"] != "")) ? "value=\"" . $_POST["firstname"] . "\" " : ""; // Enables to rewrite pseudo already typed after reloading
              print('<input type="text" class="rouded-0 form-control" class="field" name="firstname" placeholder="Prénom"  pattern="[A-Za-z- ]*" ' . $firstname .
                      'style="background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;margin-top: 5%;" />');
            ?>
          </div>

          <div class="form-group">
            <?php
              $val = (isset($_POST["mail"]) && ($_POST["mail"] != "")) ? "value=\"" . $_POST["mail"] . "\" " : ""; // Enables to rewrite mail already typed after reloading
              print('<input type="email" class="rouded-0 form-control" class="field" name="mail" placeholder="Email*" ' . $val);
              if($errors["mail"] != "")
              {
                print('style="background-color: #f88; border-color: #f22; border-style: solid; border-width: 0.3vh; margin-top: 5%;" />');
                print('<div class="alert alert-danger" role="alert" style = "font-size: 0.85em;">' . $errors["mail"] . "<br/></div>");
              }
              elseif(isset($_POST["mail"]) && ($_POST["mail"] != "")) // If mail has been typed
                print('style="background-color: #f8ca9c; border-color: rgb(0, 180, 48); border-style: solid; border-width: 0.3vh; margin-top: 5%;" />');
              else
                print('style="background-color: #f8ca9c; border-color: #908175; border-style: solid; border-width: 0.3vh; margin-top: 5%;"/>');
            ?>
          </div>

          <div class="form-group">
            <?php
              print('<input type="password" class="rouded-0 form-control" class="field" name="password" placeholder="Mot de passe*" ');
              if($errors["password"] != "")
              {
                print('style="background-color: #f88; border-color: #f22; border-style: solid; border-width: 0.3vh; margin-top: 5%;" />');
                print('<div class="alert alert-danger" role="alert" style = "font-size: 0.85em;">' . $errors["password"] . "<br/></div>");
              }
              //elseif(isset($_POST["password"]) && ($_POST["password"] != "")) // If password has been typed
              //  print('style="background-color: #f8ca9c; border-color: rgb(0, 180, 48); border-style: solid; border-width: 0.3vh; margin-top: 5%;" />');
              else
                print('style="background-color: #f8ca9c; border-color: #908175; border-style: solid; border-width: 0.3vh; margin-top: 5%;"/>');
            ?>
          </div>

          <div class="form-group">
            <?php
              print('<input type="password" class="rouded-0 form-control" class="field" name="password2" placeholder="Confirmation du mot de passe*" ');
              if($errors["password"] != "")
              {
                print('style="background-color: #f88; border-color: #f22; border-style: solid; border-width: 0.3vh; margin-top: 5%;" />');
                print('<div class="alert alert-danger" role="alert" style = "font-size: 0.85em;">' . $errors["password"] . "<br/></div>");
              }
              //elseif(isset($_POST["password2"]) && ($_POST["password2"] != "")) // If password2 has been typed
              // print('style="background-color: #f8ca9c; border-color: rgb(0, 180, 48); border-style: solid; border-width: 0.3vh; margin-top: 5%;" />');
              else
                print('style="background-color: #f8ca9c; border-color: #908175; border-style: solid; border-width: 0.3vh; margin-top: 5%;"/>');
            ?>
          </div>

          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" style="background-color: #908175;" name="submit">Valider</button>
          </div>
          <span class="already" style="margin-top: 5%;">Déjà inscrit ? <a href="/connexion">Connectez-vous</a></span>
        </form>
      </div>
    </div>
  </div>
</body>

</html>