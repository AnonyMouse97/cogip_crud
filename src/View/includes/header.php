<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="img/png" href="../../Content/img/cogipEye.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Content/CSS/style.css">
    <title>COGIP</title>
</head>

<body>
    <header>
        <nav id="navbar">
            <img src="../../Content/img/cogipLogo.png" alt="cogip-logo" class="logo">
            <ul id="hamburger-link">
                <li>
                    <a href="/index.php" class="hover-one">HOME</a>
                </li>
                <li>
                    <a href="?page=invoices" class="hover-two">INVOICES</a>
                </li>
                <li>
                    <a href="?page=companies" class="hover-three">COMPANIES</a>
                </li>
                <li>
                    <a href="?page=contact" class="hover-four">CONTACT</a>
                </li>
                <li>
                    <a href="?page=admin" class="hover-five">ADMIN</a>
                    <i class="fa fa-caret-down ddc-icon" onclick="dropDown()"></i>
                    <ul class="dropdown-content" id="ddc">
                        <li>
                            <a href="?page=admin&mode=user" class="ddc-hover">DASHBOARD</a>
                        </li>
                        <li>
                            <a href="?page=admin&mode=invoice" class="ddc-hover">NEW INVOICE</a>
                        </li>
                        <li>
                            <a href="?page=admin&mode=company" class="ddc-hover">NEW COMPANY</a>
                        </li>
                        <li>
                            <a href="?page=admin&mode=contact" class="ddc-hover">NEW CONTACT</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <a href="javascript:void(0);" class="icon" onclick="hamburgerMenu()">
                <i class="fa fa-bars fa-lg"></i>
            </a>
        </nav>
    </header>