<?php

declare(strict_types=1);

require_once('./Model/peopleManager.php');

class ContactController
{
    public function render()
    {
        $contacts = new PeopleManager();

        $view = 'View/contactView.php';

        if (isset($_GET['peopleID']) && isset($_GET['companyID'])) {
            if (ctype_digit($_GET['peopleID']) && ctype_digit($_GET['companyID'])) {
                $contact = $contacts->getContact($_GET['peopleID']);
                $contactInvoices = $contacts->getContactInvoices($_GET['peopleID'], $_GET['companyID']);
                $view = 'View/contactDetailView.php';
            } else {
                echo 'invalid ID';
            }
        }


        require $view;
    }
}
