<?php

declare(strict_types=1);

require_once('db_connect.php');

class CompaniesManager extends ConnectionManager
{
    public function getLastCompanies()
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT *
            FROM company
            ORDER BY companyID DESC
            LIMIT 5');
        $result->execute();

        return $result->fetchAll();
    }

    public function getCompanies($type)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT companyName, vatNumber, country, companyID
            FROM company
            WHERE type = :type
            ORDER BY companyName');
        $result->execute(['type' => $type]);

        return $result->fetchAll();
    }

    public function getCompany($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT companyName, vatNumber, type
            FROM company
            WHERE companyID = :id');
        $result->execute(['id' => $id]);

        $company = $result->fetch();

        return $company;
    }

    public function getContacts($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT firstName, lastName, phone, email
            FROM people
            WHERE company = :company
            ORDER BY lastName');
        $result->execute(['company' => $id]);

        return $result->fetchAll();
    }

    public function getInvoices($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT invoiceNumber, invoiceDate, firstName, lastName
            FROM invoice i
            INNER JOIN people p
            ON i.employee = p.peopleID
            WHERE i.company = :company
            ORDER BY i.invoiceDate');
        $result->execute(['company' => $id]);

        return $result->fetchAll();
    }
}
