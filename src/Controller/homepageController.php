<?php

declare(strict_types=1);

require_once('./Model/companiesManager.php');
require_once('./Model/invoicesManager.php');
require_once('./Model/peopleManager.php');

class HomepageController
{
    public function render()
    {
        $companies = new CompaniesManager();
        $companies = $companies->getLastCompanies();
        $invoices = new InvoicesManager();
        $invoices = $invoices->getLastInvoices();
        $people = new PeopleManager();
        $people = $people->getLastPeople();

        require './View/homepageView.php';
    }
}
