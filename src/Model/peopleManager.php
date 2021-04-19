<?php

declare(strict_types=1);

require_once('db_connect.php');

class PeopleManager extends ConnectionManager
{
    public function getLastPeople()
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT firstName, lastName, email, phone, companyName, peopleID, company
            FROM people p
            INNER JOIN company c
            ON c.companyID = p.company
            ORDER BY peopleID DESC
            LIMIT 5');
        $result->execute();

        return $result->fetchAll();
    }

    public function getPeople()
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT firstName, lastName, email, phone, companyName, peopleID, company
            FROM people p
            INNER JOIN company c
            ON c.companyID = p.company
            ORDER BY lastName');
        $result->execute();

        return $result->fetchAll();
    }

    public function getContact($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT firstName, lastName, email, phone, companyName
            FROM people p
            INNER JOIN company c
            ON c.companyID = p.company
            WHERE peopleID = :peopleID
            ORDER BY lastName');
        $result->execute(['peopleID' => $id]);

        $contact = $result->fetch();

        return $contact;
    }

    public function getContactInvoices($peopleID, $companyID)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT invoiceNumber, invoiceDate
            FROM invoice
            WHERE employee = :employee AND company = :company
            ORDER BY invoiceDate');
        $result->execute(['employee' => $peopleID, 'company' => $companyID]);

        return $result->fetchAll();
    }
}
