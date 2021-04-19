<?php

declare(strict_types=1);

require_once('./Model/adminManager.php');
require_once('./Model/userManager.php');

class AdminController
{
    public function render()
    {
        //if log in and admin
        if (isset($_SESSION['adminID']) && isset($_SESSION['userName']) && isset($_SESSION['admin'])) {

            //instance all classes
            $getInvoices = new InvoicesManager();
            $invoices = $getInvoices->getLastInvoices();

            $getContacts = new PeopleManager();
            $people = $getContacts->getLastPeople();

            $getCompanies = new CompaniesManager();
            $companies = $getCompanies->getLastCompanies();

            $view = './View/adminView.php';

            $admin = new AdminManager();

            //delete invoices
            if (isset($_GET['id']) && $_GET['mode'] == 'deleteInvoice'  && $_SESSION['admin']) {

                $admin->deleteInvoice($_GET['id']);
                header('Location: index.php?page=admin');
            }

            //delete companies
            if (isset($_GET['id']) && $_GET['mode'] == 'deleteCompany'  && $_SESSION['admin']) {

                $admin->deleteCompany($_GET['id']);
                header('Location: index.php?page=admin');
            }

            //delete contacts
            if (isset($_GET['id']) && $_GET['mode'] == 'deleteContact'  && $_SESSION['admin']) {

                $admin->deleteContact($_GET['id']);
                header('Location: index.php?page=admin');
            }

            //insert/update invoices
            if (isset($_GET['mode']) && $_GET['mode'] == 'invoice') {

                $admin = new AdminManager();
                $companies = $admin->getCompanies();
                $contacts = $admin->getPeople();

                //insert value if edit
                if (isset($_GET['id']) && $_SESSION['admin']) {
                    $invoice = $admin->getInvoice($_GET['id']);
                } else {
                    $invoice = ['invoiceNumber' => '', 'invoiceDate' => '', 'company' => '', 'employee' => ''];
                }

                //insert new invoice
                if (isset($_POST) && isset($_POST['invoiceNumber']) && isset($_POST['invoiceDate']) && isset($_POST['company']) && isset($_POST['contact'])) {

                    $invoiceNumber = $_POST['invoiceNumber'];
                    $invoiceDate = $_POST['invoiceDate'];
                    $company = $_POST['company'];
                    $employee = $_POST['contact'];

                    //if needed update invoice
                    if (isset($_GET['id']) && $_SESSION['admin']) {

                        $admin->updateInvoice($invoiceNumber, $invoiceDate, $company, $employee, $_GET['id']);
                        header('Location:' . $_SERVER['REQUEST_URI']);
                    } else {

                        $admin->insertInvoice($invoiceNumber, $invoiceDate, $company, $employee);
                    }
                }
            }

            //insert/update new contact
            if (isset($_GET['mode']) && $_GET['mode'] == 'contact') {

                $admin = new AdminManager();
                $companies = $admin->getCompanies();

                //insert value if edit
                if (isset($_GET['id']) && $_SESSION['admin']) {
                    $contact = $admin->getContact($_GET['id']);
                } else {

                    $contact = ['lastName' => '', 'firstName' => '', 'phone' => '', 'email' => '', 'company' => ''];
                }

                //insert new contact
                if (isset($_POST) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['company'])) {

                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $company = $_POST['company'];

                    //if needed update contact
                    if (isset($_GET['id']) && $_SESSION['admin']) {

                        $admin->updateContact($firstName, $lastName, $phone, $email, $company, $_GET['id']);
                        header('Location:' . $_SERVER['REQUEST_URI']);
                    } else {

                        $admin->insertContact($firstName, $lastName, $phone, $email, $company);
                    }
                }
            }

            //insert/edit company
            if (isset($_GET['mode']) && $_GET['mode'] == 'company') {

                $admin = new AdminManager();

                //insert value if edit
                if (isset($_GET['id']) && $_SESSION['admin']) {

                    $company = $admin->getCompany($_GET['id']);
                } else {
                    $company = ['companyName' => '', 'vatNumber' => '', 'country' => '', 'type' => ''];
                }

                //insert new company
                if (isset($_POST) && isset($_POST['companyName']) && isset($_POST['vatNumber']) && isset($_POST['country']) && isset($_POST['type'])) {

                    $companyName = $_POST['companyName'];
                    $vatNumber = $_POST['vatNumber'];
                    $country = $_POST['country'];
                    $type = $_POST['type'];

                    //update if needed
                    if (isset($_GET['id']) && $_SESSION['admin']) {

                        $admin->updateCompany($companyName, $vatNumber, $country, $type, $_GET['id']);
                        header('Location:' . $_SERVER['REQUEST_URI']);
                    } else {

                        $admin->insertCompany($companyName, $vatNumber, $country, $type);
                    }
                }
            }

            //get/update user right
            if ((isset($_GET['mode']) && $_GET['mode'] == 'user' && $_SESSION['admin'])) {

                //get users
                $users = new UserManager;
                $getUsers = $users->getUsers();

                //update user
                if (isset($_POST['admin']) && $_SESSION['admin']) {

                    $users->updateUser($_POST['admin'], $_GET['id']);

                    header('Location : index.php?page=user');
                }
            }
        } else {
            //default view if not connected
            $view = './View/login.php';

            //check if trying to connect
            if (isset($_POST['userName']) && isset($_POST['userPass'])) {

                $pass = password_hash($_POST['userPass'], PASSWORD_DEFAULT);
                $admin = new AdminManager();
                $check = $admin->getLogin($_POST['userName']);

                //check password
                if (password_verify($_POST['userPass'], $check['password'])) {

                    $_SESSION['adminID'] = $check['adminID'];
                    $_SESSION['userName'] = $check['userName'];
                    $_SESSION['admin'] = $check['admin'];
                    header('Location: index.php?page=admin');
                }
            }
        }
        //disconnect
        if (isset($_GET['session']) && $_GET['session'] == 'destroy') {

            session_destroy();
            header('Location: index.php?page=admin');
        }

        require $view;
    }
}
