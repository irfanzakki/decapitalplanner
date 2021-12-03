<!DOCTYPE html>
<html lang="en">

<head>
    <title>Decapital Planner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets_frontend/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets_frontend/img/logoicon.png">

    <link rel="stylesheet" href="../assets_frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets_frontend/css/templatemo.css">
    <link rel="stylesheet" href="../assets_frontend/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets_frontend/css/fontawesome.min.css">
</head>
<style>
    #logodecapital {
        width: 30%;
    }

    .imgdecapital {
        width: 100%;
    }
    @media only screen and (max-width: 768px) {
        #logodecapital {
            width: 50%;
        }
        .imgdecapital {
            width: 100%;
        }
    }
</style>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">csonline@decapital.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:+6289636791623">+6289636791623</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" id="logodecapital" href="/">
                <img class="float-start imgdecapital" src="./../assets_frontend/img/logobrand2.png" alt="">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown33" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Event
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown33">
                              <a class="dropdown-item" href="{{ route('events',1) }}">Birthday Party</a>
                              <a class="dropdown-item" href="{{ route('events',2) }}">Bridal Shower</a>
                              <a class="dropdown-item" href="{{ route('events',3) }}">Baby Shower</a>
                            </div>
                              
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aboutus') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactus') }}">Contact</a>
                        </li>
                        @if (Session::has('is_login'))
                        @else
                            <a class="nav-link" href="{{ route('signin') }}">Sign In</a>
                        @endif
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('is_login'))
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown33" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user text-dark mr-3"> </i> 
                            <span class="text-dark" style="font-size: 14px;">Customer</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown33">
                            <a class="dropdown-item" href="/payment">Order List</a>
                                <li><hr class="dropdown-divider"></li>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    
                        <a class="nav-icon position-relative text-decoration-none btn btn-success" href="{{ route('complain') }}">
                            <i class="fa fa-fw fas fa-headset text-white mr-1"></i>
                            <span class="text-white" style="font-size: 14px;">Complaint Center</span>
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
