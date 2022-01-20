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
    </style>
</head>
<body>
    <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about/">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blade-intro">Blade Template</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
