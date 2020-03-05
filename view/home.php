<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

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
                            <a  aria-expanded="false" class="user rounded-0 float-right" href="#" style="margin-right: 0px;margin-top:30%;width: 123px;height: 83px;">
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

        <!-- task list form -->
        <div style="display:flex;">
            <a class="btn" id="showpopup" style="margin-left:90%;margin-top:3%;background-color: #f8ca9c;border:none;">
                <img class="shadow-sm" id="popup_icon" style="border-radius:50%;" src="view/img/plus.svg">
            </a>
            <div id="popup" class="hide" style="position: absolute;display: none;margin-left:45%;">
                <div class="login-clean" style="background-color: #f8ca9c;padding:0;margin-top:10%;">
                    <form class="shadow" style="background-color: #f6b99c;" action="/create_list" method="post">
                        <div class="form-group"><label>Nom*</label><input type="text" class="rouded-0 form-control" name="title" placeholder="Liste" style="margin-bottom: 10%;background-color: #f8ca9c;border-color: #908175;border-style: solid;border-width: 0.3vh;" /></div>
                        <div class="form-group"><label>Date de début</label><input class="rouded-0 form-control" name="begin-date" placeholder="<?php
                            date_default_timezone_set('UTC');
                            echo date("d/m/y"); ?>" style="background-color: #f8ca9c;margin-bottom: 10%;border-color: #908175;border-style: solid;border-width: 0.3vh;" /></div>
                        <div class="form-group"><label>Date de fin*</label><input class="rouded-0 form-control" name="end-date" placeholder="<?php
                        date_default_timezone_set('UTC');
                        echo date("d/m/y"); ?>" style="background-color: #f8ca9c;margin-bottom: 10%;border-color: #908175;border-style: solid;border-width: 0.3vh;" /></div>
                        <div class="form-group" style="display:inline flex;"><button class="btn btn-primary btn-block" type="button" name="undo" style="background-color: #f6b99c;color:black;" onCLick="showPopupClass()">Annuler</button>
                        <button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color: #908175;margin-left:10%;border-style: solid;border-width: 0.4vh;border-color:#f6b99c;border-radius:7px;">Confirmer</button></div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            var popup = document.getElementById("popup")
            var showpopup = document.getElementById("showpopup")
            var popup_icon = document.getElementById("popup_icon")
            
            //Hide the form
            function hidePopupClass(){
                popup.className = "show"
                popup.style.display = "block"
                popup_icon.src = "view/img/less.svg"
            }
            
            //Show the form
            function showPopupClass(){
                popup.className = "hide"
                popup.style.display = "none"
                popup_icon.src = "view/img/plus.svg"
            }
            
            showpopup.addEventListener("click" , function(){
                switch(popup.className){
                    case "hide": 
                        hidePopupClass()
                    break
                    case "show":
                        showPopupClass()
                    break
                    default: 
                        alert("Si t'enlèves le d de Gady ça fait gay")
                }
            })
        </script>
        <!-- end form -->
        
        <!-- core -->
        <div class="container hero">
            <div class="row">
                <div class="col-md-8 offset-md-2"></div>
            </div>
        </div>
        <!-- end core -->

    </div>
</body>

</html>
