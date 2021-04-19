<?php

declare(strict_types=1);

session_start();

require 'Controller/homepageController.php';
require 'Controller/invoicesController.php';
require 'Controller/contactController.php';
require 'Controller/companiesController.php';
require 'Controller/adminController.php';

$controller = new HomepageController();

if (isset($_GET['page']) && $_GET['page'] == 'invoices') {
    $controller = new InvoicesController();
} else if (isset($_GET['page']) && $_GET['page'] == 'contact') {
    $controller = new ContactController();
} else if (isset($_GET['page']) && $_GET['page'] == 'companies') {
    $controller = new CompaniesController();
} else if (isset($_GET['page']) && $_GET['page'] == 'admin') {
    $controller = new AdminController();
}

$controller->render();
