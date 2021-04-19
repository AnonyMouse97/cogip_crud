<?php

declare(strict_types=1);

require_once('./Model/invoicesManager.php');

class InvoicesController
{
    public function render()
    {
        $invoices = new InvoicesManager();

        $view = 'View/invoicesView.php';

        if (isset($_GET['id'])) {
            if (ctype_digit($_GET['id'])) {
                $invoiceCompany = $invoices->getInvoicesCompany($_GET['id']);
                $invoiceContacts = $invoices->getInvoicesContacts($_GET['id']);
                $view = 'View/invoicesDetailView.php';
            } else {
                echo 'invalid ID';
            }
        }

        require $view;
    }
}
