<?php

use App\Model\App;

class header
{
    public function getHeader()
    {
        $header = "
        <!-- header -->
        <div class=header>
        <div class='shadow-sm header-dark' style='height: 100px;'>
            <nav class='navbar navbar-dark navbar-expand-lg navigation-clean-search'>
                <div class='container'><a href='/dashboard'><img src='view/img/logo.svg' style='width: 5em;max-width: 5em;'></a><button data-toggle='collapse' class='navbar-toggler' data-target='#navcol-1'><span class='sr-only'>Toggle navigation</span><span class='navbar-toggler-icon'></span></button>
                    <div class='collapse navbar-collapse' id='navcol-1'>
                        <ul class='nav navbar-nav'>
                            <li class='nav-item' role='presentation'></li>
                        </ul>
                        <form class='form-inline mr-auto' target='_self'>
                            <div class='form-group' style='margin-left: 30%;'>
                                <input type='search' class='rounded-0 form-control search-field' id='search-field' name='search' style='background-color: #FDE6C5;' /><label for='search-field'>
                                    <button class='btn rounded-0' type='submit' style='height: 38px;width: 34px;background-color: #FDE6C5;margin-left: 0px;'>
                                        <i class='fa fa-search rounded-0' id='search-icon' style='font-size: 20px;margin-left: -4px;'></i>
                                    </button></label>
                            </div>
                        </form>
                        <div class='dropdown'>
                            <a aria-expanded='false' class='user rounded-0 float-right' href='#' style='margin-right: 0px;margin-top:30%;width: 123px;height: 83px;'>
                                <img class='float-right' src='view/img/user.svg' style='width: 85%;height: 75%;margin-right: 5%;' />
                            </a>
                            <div role='menu' class='dropdown-content'>
                                <a role='presentation' class='dropdown-item' href='/accountInfo'>Mes informations</a>
                                <a role='presentation' class='dropdown-item' href='/deconnexion'>Déconnexion <ion-icon name='power-outline'></ion-icon></a></div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- end header -->
        
        ";

    return $header;
    }
}

echo "hello /header";
