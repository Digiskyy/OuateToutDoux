<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="view/js/jquery.min.js"></script>
  <title>Document</title>
</head>

<body>
  <form action="/invite_user" method="POST">
    <input list="pseudo-suggests" type="text" name="pseudo" id="input-pseudo">
    <input type="hidden" name="list-id" value=<?= $_GET["id"] ?>>
    <datalist id="pseudo-suggests">
    </datalist>
    <input type="submit" value="Valider" name="submit">
  </form>

  <script>
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