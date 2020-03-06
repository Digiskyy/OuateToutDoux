<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>

        <!-- css -->
        <link rel="stylesheet" href="/view/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
        <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/view/css/Header-Dark.compiled.css">
        <link rel="stylesheet" href="/view/css/home.css">
        <link rel="stylesheet" href="/view/css/accountInfo.css">



        <!-- js -->
        <script src="js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
        <script src="js/jquery.min.js"></script>

    <title>Personnal-Info</title>
</head>

<body style="background-color: #FDE6C5;">

    <div>
        <!-- header -->
        <div class="shadow-lg header-dark" style="height: 100px;">
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
                <div class="container"><a href="/dashboard" style="width:60%;max-width:60%;margin-left:0;"> <img src="/view/img/logo.svg" style="width: 10%;max-width: 10%;"></a>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
                                <img class="float-right" src="/view/img/user.svg" style="width: 85%;height: 75%;margin-right: 5%;" />
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

        <?php
            require_once("controller/accountInfoController.php");
        ?>

        <form method="post" action="/accountInfo" id="usr-info-form" class="info-form">

            <h1>Mon compte</h1>
            <div class="form-info-line">
                <label>Nom : </label>
                <input type="text" id="usr-last-name" name="name" value="<?php echo $lastName;   ?>" readOnly="true">
                <a href="#">
                    <img alt="Modify last name on click" src="/view/img/pencil.png" id="img_name" width="30" height="30" onClick="modifyName()">
                </a>
            </div>

            <div class="form-info-line">
                <label>Prénom : </label>

                <input type="text" id="usr-first-name" name="surname" value="<?php echo  $firstName; ?>" readOnly="true">
                <a href="#">
                    <img alt="Modify first name on click" id="img_first_name" src="/view/img/pencil.png" width="30" height="30" onClick="modifyFirstName()">
                </a>
            </div>


            <div class="form-info-line">
                <label>E-mail : </label>
                <input type="text" id="usr-e-mail"  name="email" value="<?php echo $eMail;   ?>" readOnly="true">
                <a href="#">
                    <img alt="Modify e-mail on click" id="img_email" src="/view/img/pencil.png" width="30" height="30" onClick="modifyEmail()">
                </a>
            </div>

            <div class="form-info-line">
                <label>Ancien mot de passe : </label>
                <input type="password" name="old-usr-password">
            </div>
            <div class="form-info-line">
                <label>Nouveau mot de passe : </label>
                <input type="password" name="new-usr-password">
            </div>
            <div class="form-info-line">
                <label>Confirmation : </label>
                <input type="password" name="new-usr-password-confirmation">
            </div>

            <input type="submit">


        </form>
<<<<<<< HEAD
        <a href="/deleteAccount">Supprimer le compte</a>
        
=======


>>>>>>> 07733c181a8d637cd17535112165990447972096
         <script language="JavaScript">
            var modifyNam = false;
            var modifyFirstNam = false;
            var modifyEmai = false;

            //Modify Name
            function modifyName(){
                if(!modifyNam){
                    document.getElementById("usr-last-name").removeAttribute("readOnly");
                    document.getElementById("img_name").src = "/view/img/validate.png";
                    modifyNam = true;
                }else{
                    document.getElementById("usr-last-name").setAttribute("readOnly", "true");
                    document.getElementById("img_name").src = "/view/img/pencil.png";
                    modifyNam = false;
                }
            }

            //Modify first name
            function modifyFirstName(){
                if(!modifyFirstNam){
                    document.getElementById("usr-first-name").removeAttribute("readOnly");
                    document.getElementById("img_first_name").src = "/view/img/validate.png";
                    modifyFirstNam = true;
                }else{
                    document.getElementById("usr-first-name").setAttribute("readOnly", "true");
                    document.getElementById("img_first_name").src = "/view/img/pencil.png";
                    modifyFirstNam = false;
                }
            }

            //Modify email
            function modifyEmail()
            {
                if(!modifyEmai){
                    document.getElementById("usr-e-mail").removeAttribute("readOnly");
                    document.getElementById("img_email").src = "/view/img/validate.png";
                    modifyEmai = true;
                }else{
                    document.getElementById("usr-e-mail").setAttribute("readOnly", "true");
                    document.getElementById("img_email").src = "/view/img/pencil.png";
                    modifyEmai = false;
                }
            }

<<<<<<< HEAD
            
=======
>>>>>>> 07733c181a8d637cd17535112165990447972096
        </script>


</body>



</html>
