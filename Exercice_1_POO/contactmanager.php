<?php

require_once 'dbconnect.php';
require_once 'contact.php';

class ContactManager
{
    private PDO $pdo;

    public function __construct()
    {
        $db = new DBConnect();
        $this->pdo = $db->getPDO();
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM contact";
        $stmt = $this->pdo->query($sql);

        $contacts = [];

        while ($row = $stmt->fetch()) {
            $contact = new Contact();
            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setEmail($row['email']);
            $contact->setPhone_number($row['phone_number']);

            $contacts[] = $contact;
        }

        // Test demandé par l’énoncé
        // var_dump($contacts);

        return $contacts;
    }

    public function findById(int $id): ?Contact
    {
        $sql = "SELECT * FROM contact WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        $contact = new Contact();
        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setEmail($row['email']);
        $contact->setPhone_number($row['phone_number']);

        return $contact;
    }

    public function create(string $name, string $email, string $phone_number): ?Contact
    {
        $sql = "INSERT INTO contact(name, email, phone_number) VALUES (:name, :email, :phone_number) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'phone_number' => $phone_number]);
        $id = $this->pdo->lastInsertId();
        return $this->findById($id);
    }

    public function delete(int $id): void
    {
        $sql = "DELETE FROM contact WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
