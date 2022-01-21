<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Blade other directive</title> --}}
    @stack('title')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cd2f54a5d7.js" crossorigin="anonymous"></script>
    <style>
        a {
        color: #6c757d;
        }

        a:hover {
        color: #fec503;
        text-decoration: none;
        }

        ::selection {
        background: #fec503;
        text-shadow: none;
        }

        footer {
        padding: 2rem 0;
        background-color: #212529;
        }

        .footer-column:not(:first-child) {
        padding-top: 2rem;
        }
        @media (min-width: 768px) {
        .footer-column:not(:first-child) {
            padding-top: 0rem;
        }
        }

        .footer-column {
        text-align: center;
        }
        .footer-column .nav-item .nav-link {
        padding: 0.1rem 0;
        }
        .footer-column .nav-item span.nav-link {
        color: #6c757d;
        }
        .footer-column .nav-item span.footer-title {
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
        }
        .footer-column .nav-item .fas {
        margin-right: 0.5rem;
        }
        .footer-column ul {
        display: inline-block;
        }
        @media (min-width: 768px) {
        .footer-column ul {
            text-align: left;
        }
        }

        ul.social-buttons {
        margin-bottom: 0;
        }

        ul.social-buttons li a:active,
        ul.social-buttons li a:focus,
        ul.social-buttons li a:hover {
        background-color: #fec503;
        }

        ul.social-buttons li a {
        font-size: 20px;
        line-height: 40px;
        display: block;
        width: 40px;
        height: 40px;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
        color: #fff;
        border-radius: 100%;
        outline: 0;
        background-color: #1a1d20;
        }

        footer .quick-links {
        font-size: 90%;
        line-height: 40px;
        margin-bottom: 0;
        text-transform: none;
        font-family: Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .copyright {
        color: white;
        }

        .fa-ellipsis-h {
        color: white;
        padding: 2rem 0;
        }

        h2{
            color: red;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {
            .dropdown-menu li{ position: relative; 	}
            .nav-item .submenu{ 
                display: none;
                position: absolute;
                left:100%; top:-7px;
            }
            .nav-item .submenu-left{ 
                right:100%; left:auto;
            }
            .dropdown-menu > li:hover{ background-color: #f1f1f1 }
            .dropdown-menu > li:hover > .submenu{ display: block; }
        }	
        /* ============ desktop view .end// ============ */

        /* ============ small devices ============ */
        @media (max-width: 991px) {
        .dropdown-menu .dropdown-menu{
            margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
        }
        }	
        /* ============ small devices .end// ============ */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="https://laravel.com/" target="_blank"><img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" width="50" height="52" /> LEARNING</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
          <ul class="navbar-nav">
            <li class="nav-item active"> <a class="nav-link" href="/home/Meehul"><i class="fas fa-home"></i>&nbsp;Home </a> </li>
            <li class="nav-item"><a class="nav-link" href="/about"><i class="fas fa-address-card"></i> About </a></li>
            <li class="nav-item"><a class="nav-link" href="/blade-intro"><i class="fas fa-chalkboard-teacher"></i> Blade Template Intro </a></li>
            <li class="nav-item dropdown" id="myDropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fas fa-gamepad"></i> Controllers  </a>
              <ul class="dropdown-menu">
                <li> <a class="dropdown-item" href="/basic_controller"><i class="fab fa-accusoft"></i> Basic Controllers </a></li>
                <li> <a class="dropdown-item" href="/single_action_controller"><i class="fas fa-radiation"></i> Single-action Controller </a></li>
                <li> <a class="dropdown-item" href="#"><i class="fas fa-database"></i> Resource Controller <i class="fas fa-angle-double-right"></i></a>
                  <ul class="submenu dropdown-menu">
                    <li><a class="dropdown-item" href="/photo"><i class="fas fa-phone-volume"></i> &fnof;(index)</a></li>
                    <li><a class="dropdown-item" href="/photo/create"><i class="fas fa-phone-volume"></i> &fnof;(create)</a></li>
                    <li><a class="dropdown-item disabled" href="#"><i class="fas fa-phone-volume"></i> &fnof;(store)</a></li>
                    <li><a class="dropdown-item" href="/photo/Meehul ki id"><i class="fas fa-phone-volume"></i> &fnof;(show)</a></li>
                    <li><a class="dropdown-item disabled" href="#"><i class="fas fa-phone-volume"></i> &fnof;(edit)</a></li>
                    <li><a class="dropdown-item disabled" href="#"><i class="fas fa-phone-volume"></i> &fnof;(update)</a></li>
                    <li><a class="dropdown-item disabled" href="#"><i class="fas fa-phone-volume"></i> &fnof;(destroy)</a></li>
                    {{-- <li><a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
                      <ul class="submenu dropdown-menu">
                        <li><a class="dropdown-item" href="#">Multi level 1</a></li>
                        <li><a class="dropdown-item" href="#">Multi level 2</a></li>
                      </ul>
                    </li>
                    <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
                    <li><a class="dropdown-item" href="#">Submenu item 5</a></li> --}}
                  </ul>
                </li>
                {{-- <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
                <li><a class="dropdown-item" href="#"> Dropdown item 4 </a></li> --}}
              </ul>
            </li>
            <li class="nav-item dropdown" id="myDropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fab fa-wpforms"></i> Forms  </a>
                <ul class="dropdown-menu">
                  <li> <a class="dropdown-item" href="/forms"><i class="fas fa-user-tie"></i> Registraion form (client-side validation) </a></li>
                  <li> <a class="dropdown-item" href="/forms_server"><i class="fas fa-server"></i> Registraion form (server-side validation) </a></li>

                </ul>
            </li>
            <li class="nav-item"> <a class="nav-link" href="/components"><i class="fas fa-recycle"></i>&nbsp;Components </a> </li>
          </ul>
        </div>
        <!-- navbar-collapse.// -->
        </div>
        <!-- container-fluid.// -->
        </nav>
