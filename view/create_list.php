<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>OTD | Créer liste</title>

  <!-- css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/Header-Dark.compiled.css">
  <link rel="stylesheet" href="css/Login-Form-Clean.css" />
  <link rel="stylesheet" href="view/css/task_list.css">


  <!-- js -->
  <script src="view/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script src="view/js/jquery.min.js"></script>

</head>

<body>

  <div>
    <!-- header -->
    <div class="shadow-sm header-dark" style="height: 100px;">
      <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
        <div class="container"><a href="/dashboard" style="width:60%;max-width:60%;margin-left:0;"> <img src="/view/img/logo.svg" style="width: 10%;max-width: 10%;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
              <li class="nav-item" role="presentation"></li>
            </ul>
            <form class="form-inline mr-auto" target="_self">
              <div class="form-group" style="margin-left: 0;">
                <input type="search" class="rounded-0 form-control search-field" id="search-field" name="search" style="background-color: #f8ca9c;" /><label for="search-field">
                  <button class="btn rounded-0" type="submit" style="height: 38px;width: 34px;background-color: #f6b99c;margin-left: 0px;">
                    <i class="fa fa-search rounded-0" id="search-icon" style="font-size: 20px;margin-left: -4px;"></i>
                  </button></label>
              </div>
            </form>
            <div class="dropdown">
              <a aria-expanded="false" class="user rounded-0 float-right" href="#" style="margin-right: 0px;margin-top:30%;width: 123px;height: 83px;">
                <img class="float-right" src="view/img/user.svg" style="width: 85%;height: 75%;margin-right: 5%;" />
              </a>
              <div role="menu" class="dropdown-content">
                <a role="presentation" class="dropdown-item" href="/accountInfo">Mes informations</a>
                <a role="presentation" class="dropdown-item" href="/deconnexion">Déconnexion <ion-icon name="power-outline"></ion-icon></a></div>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <!-- end header -->

    <!-- core -->
    <div class="show-task-list">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <?php
          foreach ($task_list as $task) {
          ?>
            <a href=<?= "/liste?id=" . $task["idList"] ?>>
              <div>
                <?= $task["title"] ?>
              </div>
              <div>
                <?= $task["dateCreation"] ?>
              </div>
              <div>
                <?= $task["dateEnd"] ?>
              </div>
            </a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <!-- end core -->







</body>


</html>