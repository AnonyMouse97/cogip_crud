<?php

declare(strict_types=1);

require_once('./Model/companiesManager.php');

class CompaniesController
{
    public function render()
    {
        $companies = new CompaniesManager();

        if (isset($_GET['sort'])) {
            if ($_GET['sort'] == 'client') {
                $clients = $companies->getCompanies('client');
            } elseif ($_GET['sort'] == 'provider') {
                $suppliers = $companies->getCompanies('provider');
            }
        } else {
            $clients = $companies->getCompanies('client');
            $suppliers = $companies->getCompanies('provider');
        }

        $view = 'View/companiesView.php';

        if (isset($_GET['id'])) {
            if (ctype_digit($_GET['id'])) {
                $company = $companies->getCompany($_GET['id']);
                $contacts = $companies->getContacts($_GET['id']);
                $invoices = $companies->getInvoices($_GET['id']);
                $view = 'View/companiesDetailView.php';
            } else {
                echo 'invalid ID';
            }
        }
        require $view;
    }
}
