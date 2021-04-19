<?php

declare(strict_types=1);

require_once('./Model/db_connect.php');

class AdminManager extends ConnectionManager
{
    public function getLogin($userName)
    {
        $db = $this->connect_db();

        $result = $db->prepare("SELECT *
       FROM admin
       WHERE userName = :userName");
        $result->execute(['userName' => $userName]);

        $login = $result->fetch();

        return $login;
    }

    public function deleteInvoice($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare("DELETE
       FROM invoice
       WHERE invoiceID = :invoiceID");
        $result->execute(['invoiceID' => $id]);
    }

    public function deleteContact($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare("DELETE
       FROM people
       WHERE peopleID = :peopleID");
        $result->execute(['peopleID' => $id]);
    }

    public function deleteCompany($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare("DELETE
       FROM company
       WHERE companyID = :companyID");
        $result->execute(['companyID' => $id]);
    }

    public function getCompanies()
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT companyName, companyID
            FROM company
            ORDER BY companyName');
        $result->execute();

        return $result->fetchAll();
    }

    public function getPeople()
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT firstName, lastName, peopleID
            FROM people
            ORDER BY lastName');
        $result->execute();

        return $result->fetchAll();
    }

    public function getInvoice($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT invoiceNumber, invoiceDate, company, employee
        FROM invoice
        WHERE invoiceID = :invoiceID');
        $result->execute(['invoiceID' => $id]);

        $invoice = $result->fetch();

        return $invoice;
    }

    public function getCompany($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT companyName, vatNumber, country, type
        FROM company
        WHERE companyID = :companyID');
        $result->execute(['companyID' => $id]);

        $company = $result->fetch();

        return $company;
    }

    public function getContact($id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT firstName, lastName, phone, email, company
        FROM people
        WHERE peopleID = :peopleID');
        $result->execute(['peopleID' => $id]);

        $people = $result->fetch();


        return $people;
    }

    public function insertInvoice($invoiceNumber, $invoiceDate, $company, $employee)
    {
        $db = $this->connect_db();

        $result = $db->prepare('INSERT INTO invoice (invoiceNumber, invoiceDate, company, employee)
        VALUES (:invoiceNumber, :invoiceDate, :company, :employee)');
        $result->execute([
            'invoiceNumber' => $invoiceNumber,
            'invoiceDate' => $invoiceDate,
            'company' => $company,
            'employee' => $employee
        ]);
    }

    public function insertContact($firstName, $lastName, $phone, $email, $company)
    {
        $db = $this->connect_db();

        $result = $db->prepare('INSERT INTO people (firstName, lastName, phone, email, company)
        VALUES (:firstName, :lastName, :phone, :email, :company)');
        $result->execute([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'phone' => $phone,
            'email' => $email,
            'company' => $company
        ]);
    }

    public function insertCompany($companyName, $vatNumber, $country, $type)
    {
        $db = $this->connect_db();

        $result = $db->prepare('INSERT INTO company (companyName, vatNumber, country, type)
        VALUES (:companyName, :vatNumber, :country, :type)');
        $result->execute([
            'companyName' => $companyName,
            'vatNumber' => $vatNumber,
            'country' => $country,
            'type' => $type
        ]);
    }

    public function updateInvoice($invoiceNumber, $invoiceDate, $company, $employee, $id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('UPDATE invoice 
        SET invoiceNumber = :invoiceNumber, invoiceDate = :invoiceDate, company = :company, employee = :employee
        WHERE invoiceID = :id');
        $result->execute([
            'invoiceNumber' => $invoiceNumber,
            'invoiceDate' => $invoiceDate,
            'company' => $company,
            'employee' => $employee,
            'id' => $id
        ]);
    }

    public function updateContact($firstName, $lastName, $phone, $email, $company, $id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('UPDATE people 
        SET firstName = :firstName, lastName = :lastName, phone = :phone, email = :email, company = :company
        WHERE peopleID = :id');
        $result->execute([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'phone' => $phone,
            'email' => $email,
            'company' => $company,
            'id' => $id
        ]);
    }

    public function updateCompany($companyName, $vatNumber, $country, $type, $id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('UPDATE company 
        SET companyName = :companyName, vatNumber = :vatNumber, country = :country, type = :type
        WHERE companyID = :id');
        $result->execute([
            'companyName' => $companyName,
            'vatNumber' => $vatNumber,
            'country' => $country,
            'type' => $type,
            'id' => $id
        ]);
    }
}
