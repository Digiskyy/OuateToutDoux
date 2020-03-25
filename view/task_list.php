<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Liste de tâches</title>
  <link rel="icon" type="image/png" href="view/img/logo.png" />

  <!-- css -->
  <link rel="stylesheet" href="view/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="view/css/Header-Dark.compiled.css">
  <link rel="stylesheet" href="view/css/Login-Form-Clean.css" />
  <link rel="stylesheet" href="view/css/home.css">
  

  <!-- js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="view/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script src="view/js/jquery.min.js"></script>

</head>

<body style="background-color: #f8ca9c;">
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

    <div id="popupAddTask" class="hide" style="position: absolute;display: none;margin-left:45%; z-index: 999;">
      <div class="login-clean" style="background-color: #f8ca9c;padding:0; margin-top: 10%;">
        <form class="shadow" style="background-color: #f6b99c; width: 100%;" action="/create_task" method="post">
          <div class="form-group">
            <label>Titre*</label>
            <input type="text" class="rouded-0 form-control" name="title" placeholder="Ma nouvelle tâche" style="margin-bottom: 10%;background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;" />

            <input type="hidden" name="id-list" value=<?= $id_list ?>>
          </div>
          <div class="form-group" style="display:flex; flex-direction: column; align-items: center; margin-top: 64px;">
            <button class="btn btn-outline-dark btn-block" type="button" name="undo" style="background-color: #f6b99c;color:black;" onCLick="hidePopupClass()">Annuler</button>
            <button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color: #908175; border-style: solid;border-width: 0.4vh;border-color:#f6b99c;border-radius:7px;">Confirmer</button></div>
        </form>
      </div>
    </div>

    <div id="popupInvite" class="hide" style="position: absolute;display: none;margin-left:45%; z-index: 999;">
      <div class="login-clean" style="background-color: #f8ca9c;padding:0; margin-top: 10%;">
        <form class="shadow" style="background-color: #f6b99c; width: 100%;" action="/create_task" method="post">
          <div class="form-group">
            <label>Nom d'utilisateur*</label>
            <input type="text" class="rouded-0 form-control" name="pseudo" placeholder="Ma nouvelle tâche" style="margin-bottom: 10%;background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;" />

            <input type="hidden" name="id-list" value=<?= $id_list ?>>
          </div>
          <div class="form-group" style="display:flex; flex-direction: column; align-items: center; margin-top: 64px;">
            <button class="btn btn-outline-dark btn-block" type="button" name="undo" style="background-color: #f6b99c;color:black;" onCLick="hidePopupClass()">Annuler</button>
            <button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color: #908175; border-style: solid;border-width: 0.4vh;border-color:#f6b99c;border-radius:7px;">Confirmer</button></div>
        </form>
      </div>
    </div>

    <!-- core -->
    <div class="container hero">
      <h1 style="text-align: center; margin: 16px 0;">"<?= $title ?>" liste</h1>
      <div class="row">
        <div class="col-md-8">
          <div style="display: flex; justify-content: space-between; margin-bottom: 16px;">
            <h2>Tâches</h2>
            <button id="popupAddTaskToggle" type="button" class="btn btn-outline-dark" onclick="togglePopupAddTask()">Créer tâche</button>
          </div>
          <ul class="list-group list-group-flush">
            <?php
            foreach ($task_list as $task) {
            ?>
              <li class="list-group-item list-of-lists">
                <div style="display: flex;">
                  <form action="/assign_task" method="post" style="margin-right: 8px;">
                    <input type="hidden" name="idList" value=<?= $id_list ?>>
                    <input type="hidden" name="idTask" value=<?= $task['idTask'] ?>>
                    <input type="hidden" name="myId" value=<?= $my_id ?>>
                    <input type="checkbox" onclick="updateTaskState(<?= $task['idTask'] ?>, this.checked)" <?= $my_id != $task['idUserContribution'] ? "disabled" : "" ?> <?= $task['state'] == '1' ? "checked" : "" ?> aria-label="Checkbox for following text input">
                  </form>
                  <span><?= $task["title"] ?> </span>
                </div>

                <div style="display: flex; align-items: center;">
                  <span style="margin-right: 16px;">créée : <?= $task["dateCreation"] ?> </span>
                  <?php if ($task['idUserContribution'] != 0) {
                    foreach ($user_list as $user) {
                      if ($user->idUser == $task['idUserContribution']) { ?>
                        <span class="badge badge-primary" style="color: white; background-color: grey; margin-right: 8px;"><?= $user->pseudo ?></span>
                  <?php break;
                      }
                    }
                  } ?>
                  <?php if ($task['idUserContribution'] == 0) { ?>
                    <form action="/assign_task" method="post" style="margin-right: 8px;">
                      <input type="hidden" name="idList" value=<?= $id_list ?>>
                      <input type="hidden" name="idTask" value=<?= $task['idTask'] ?>>
                      <input type="hidden" name="myId" value=<?= $my_id ?>>
                      <button type="submit" name="assign" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="bottom" title="Se proposer"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                    </form>
                  <?php } else if ($task['idUserContribution'] == $my_id) { ?>
                    <form action="/assign_task" method="post" style="margin-right: 8px;">
                      <input type="hidden" name="idList" value=<?= $id_list ?>>
                      <input type="hidden" name="idTask" value=<?= $task['idTask'] ?>>
                      <input type="hidden" name="myId" value=<?= $my_id ?>>
                      <button type="submit" name="release" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="bottom" title="Se désister"><i class="fa fa-minus" aria-hidden="true"></i></button>
                    </form>
                  <?php } ?>
                  <form action="/delete_task" method="post" style="display: <?= $idUserOwner == $my_id ? "inherit" : "none" ?>">
                    <input type="hidden" name="idList" value=<?= $id_list ?>>
                    <input type="hidden" name="idTask" value=<?= $task['idTask'] ?>>
                    <button type="submit" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="bottom" title="Supprimer la tâche"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </form>
                </div>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
        <div class="col-md-3 offset-md-1">
          <div style="display: flex; flex-direction: column; margin-bottom: 16px;">
            <h2>Membres</h2>
            <form action="/invite_user" method="POST" style="display: flex; align-items: center;">
              <div>
                <input list="pseudo-suggests" type="text" name="pseudo" id="input-pseudo" style="width: 86%;">
                <input type="hidden" name="list-id" value=<?= $_GET["id"] ?>>
                <datalist id="pseudo-suggests">
                </datalist>
              </div>
              <button class="btn btn-outline-secondary" name="submit" type="submit">Inviter</button>
            </form>

          </div>
          <ul class="list-group list-group-flush">
            <?php
            foreach ($user_list as $user) {
            ?>
              <li class="list-group-item list-of-lists" style="display: flex; justify-content: space-between;">
                <span><?= $user->pseudo ?></span>
                <span><?= $user->idUser == $idUserOwner ? "créateur" : "" ?></span>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- end core -->

    <script>
      var popupAddTask = document.getElementById("popupAddTask")
      var popupAddTaskToggle = document.getElementById("popupAddTaskToggle")
      var popup_icon = document.getElementById("popup_icon")


      //Hide the form
      function hidePopupClass() {
        popupAddTask.className = "hide"
        popupAddTask.style.display = "none"
        popupAddTask.style.transform = "none"
        popupAddTaskToggle.disabled = false
      }

      //Show the form
      function showPopupClass() {
        popupAddTask.className = "show"
        popupAddTask.style.display = "block"
        popup_icon.style.transform = "rotate(45deg)"
        popupAddTaskToggle.disabled = true
      }

      function togglePopupAddTask() {
        switch (popupAddTask.className) {
          case "hide":
            showPopupClass()
            break
          case "show":
            hidePopupClass()
            break
          default:
            alert("Si t'enlèves le d de Gady ça fait gay")
        }
      }

      function updateTaskState(idTask, checked) {
        console.log({
          idTask,
          checked
        })
        fetch(`/update_task?idTask=${idTask}&checked=${checked}`, {
          method: 'POST'
        }).then((res) => res.text()).then((data) => console.log(data))
      }

      window.onload = function() {
        document.getElementById("input-pseudo").onkeyup = (e) => {
          const currentPseudo = e.target.value;
          if (currentPseudo.length > 0) {
            $.ajax({
              url: "/suggest",
              data: {
                q: currentPseudo
              },
              method: "GET",
              dataType: "json",
            }).done(res => {
              $("#pseudo-suggests").empty(); // On vide l'ancienne liste de suggestions
              for (let pseudo of res) {
                let newOption = document.createElement("option");
                newOption.textContent = pseudo;
                $("#pseudo-suggests").append(newOption);
              }
            });
          }
        }
      }
    </script>
</body>

</html>