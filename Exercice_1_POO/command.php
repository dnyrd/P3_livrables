<?php

require_once 'contactmanager.php';

class Command
{
    private ContactManager $contactManager;

    public function __construct()
    {
        $this->contactManager = new ContactManager();
    }

    public function list(): void
    {
        $contacts = $this->contactManager->findAll();

        foreach ($contacts as $contact) {
            echo $contact . PHP_EOL;
        }
    }

    public function detail(int $id): void
    {
        $contact = $this->contactManager->findById($id);

        if ($contact === null) {
            echo "❌ Contact introuvable\n";
            return;
        }

        echo $contact . PHP_EOL;
    }

    public function create( $name, $email, $phone_number): void
    {
        $contact = $this->contactManager->create($name, $email, $phone_number);
               echo "Contact créé:  ".$contact . PHP_EOL;
    }

    public function delete(int $id): void
    {
        $this->contactManager->delete($id);
        echo "✅ Contact supprimé\n";
    }
}
