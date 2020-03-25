<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTD | Mes informations</title>
    <link rel="icon" type="image/png" href="view/img/logo.png" />

    <!-- css -->
    <link rel="stylesheet" href="/view/css/bootstrap.min.css">
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
</head>

<body style="background-color: #FDE6C5;">

    <div>
        <!-- header -->
        <div class="shadow-sm header-dark" style="height: 100px;">
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

        <main class="info-form">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                                <div class="card shadow-sm" style="background-color: #f6b99c;border-style: solid;border-radius: 0;border-color: #f6b99c;">
                                    <div class="card-body">
                                        <h2 class="text-center">Mon compte</h2>
                                        <form method="post" action="/accountInfo" id="usr-info-form">
                                            <div class="form-group row" style="margin-top:30px;">
                                                <label for="full_name" class="col-md-4 col-form-label text-md-right">Nom :</label>
                                                <div class="col-md-6" style="display: inline flex;">
                                                    <input type="text" class="form-control" id="usr-last-name" style="width:330px;" name="name" value="<?php echo $lastName;   ?>" readOnly="true">
                                                </div>
                                                <a href="#">
                                                    <img alt="Modify last name on click" src="/view/img/pencil.png" id="img_name" style="margin-left:0;" width="30" height="30" onClick="modifyName()">
                                                </a>
                                            </div>

                                            <div class="form-group row" style="margin-top:10px;">
                                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Prénom :</label>
                                                <div class="col-md-6" style="display: inline flex;">
                                                    <input type="text" class="form-control" id="usr-first-name" style="width:330px;" name="surname" value="<?php echo  $firstName; ?>" readOnly="true">
                                                </div>
                                                <a href="#">
                                                    <img alt="Modify last name on click" src="/view/img/pencil.png" id="img_name" style="margin-left:0;" width="30" height="30" onClick="modifyFirstName()">
                                                </a>
                                            </div>

                                            <div class="form-group row" style="margin-top:10px;">
                                                <label for="user_name" class="col-md-4 col-form-label text-md-right">Email :</label>
                                                <div class="col-md-6" style="display: inline flex;">
                                                    <input type="text" class="form-control" id="usr-e-mail"  style="width:330;" name="email" value="<?php echo $eMail;   ?>" readOnly="true">
                                                </div>
                                                <a href="#">
                                                    <img alt="Modify last name on click" src="/view/img/pencil.png" id="img_name" style="margin-left:0;" width="30" height="30" onClick="modifyEmail()">
                                                </a>
                                            </div>

                                            <div class="form-group row" style="margin-top:10px;">
                                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Ancien mot de passe :</label>
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" style="width:330px;" name="old-usr-password">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-top:10px;">
                                                <label for="present_address" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe :</label>
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" style="width:330px;" name="new-usr-password">
                                                </div>
                                            </div>

                                            <div class="form-group row" style="margin-top:10px;">
                                                <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Confirmation :</label>
                                                <div class="col-md-6">
                                                    <input type="password" class="form-control" style="width:330px;" name="new-usr-password-confirmation">
                                                </div>
                                            </div>

                                            <div class="col-md-6 offset-md-4" style="margin-top:15px;">
                                                <button type="submit" class="btn btn-primary" style="background-color:#908175;border-color:#908175;">
                                                    Envoyer
                                                </button>
                                                <button type="button" class="btn btn-primary" value="Supprimer compte" onClick="deleteAccount()" style="background-color:#908175;border-color:#908175;margin-left:30px;">
                                                    Supprimer compte
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


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
            
            function deleteAccount()
            {
                if(confirm("Etes vous sûr de vouloir supprimer votre compte ?")){
                    window.location.assign("/deleteAccount");
                    // Recharge la page actuelle, sans utiliser le cache
                    document.location.reload(true);
                }
            }

        </script>


</body>



</html>
