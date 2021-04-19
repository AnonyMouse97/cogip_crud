<?php

declare(strict_types=1);

require_once('db_connect.php');

class InvoicesManager extends ConnectionManager
{
    public function getLastInvoices()
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT *
            FROM invoice i
            INNER JOIN company c
            ON c.companyID = i.company
            ORDER BY invoiceDate DESC
            LIMIT 5');
        $result->execute();

        return $result->fetchAll();
    }

    public function getInvoices()
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT invoiceID, invoiceNumber, invoiceDate, companyName, company
            FROM invoice i
            INNER JOIN company c
            ON c.companyID = i.company
            ORDER BY invoiceDate DESC');
        $result->execute();

        return $result->fetchAll();
    }

    public function getInvoicesCompany($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT companyName, vatNumber, type
            FROM company
            WHERE companyID = :companyID');

        $result->execute(['companyID' => $id]);

        $invoiceCompany = $result->fetch();

        return $invoiceCompany;
    }

    public function getInvoicesContacts($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT firstName, lastName, email, phone
            FROM people
            WHERE company = :company');

        $result->execute(['company' => $id]);

        return $result->fetchAll();
    }
}
