<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Liste de tâches</title>

  <!-- css -->
  <link rel="stylesheet" href="view/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="view/css/Header-Dark.compiled.css">
  <link rel="stylesheet" href="view/css/Login-Form-Clean.css" />
  <link rel="stylesheet" href="view/css/home.css">

  <!-- js -->
  <script src="view/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script src="view/js/jquery.min.js"></script>

</head>

<body>
  <h1><?= $title ?></h1>
  <div>
    <form action="/create_task" method="POST">
      <fieldset>
        <legend>Ajouter une tâche</legend>
        <label for="title-input">Titre de la tâche: </label><input type="text" name="title" id="title-input">
        <input type="hidden" name="id-list" value=<?= $id_list ?>>
        <input type="submit" name="submit" value="Ajouter">
      </fieldset>
    </form>
    <h2>Liste des membres:</h2>
    <ul>
      <?php
      foreach ($user_list as $user) {
      ?>
        <li>
          <?= $user->pseudo ?>
        </li>
      <?php
      }
      ?>
    </ul>
    <h2>Liste des tâches:</h2>
    <ul>
      <?php
      foreach ($task_list as $task) {
      ?>
        <li>
          <?= print_r($task, true) ?>
        </li>
      <?php
      }
      ?>
    </ul>
  </div>
</body>

</html>