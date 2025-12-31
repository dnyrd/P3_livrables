<?php

require_once "dbconnect.php";
require_once "contactmanager.php";




/* ==========================
   APPLICATION CLI
   ========================== */
class Application
{
    private ContactManager $contactManager;

    public function __construct()
    {
        $this->contactManager = new ContactManager();
    }

    public function run(): void
    {
        echo "=== Application CLI Contacts ===\n";
        echo "Commandes : aide, lister, supprimer, quitter\n\n";

        while (true) {
            $commande = strtolower(trim(readline('> ')));

            switch ($commande) {
                case 'aide':
                    $this->aide();
                    break;

                case 'lister':
                    $this->listerContacts();
                    break;
                
                case 'supprimer':
                    $this->listerContacts();
                    exit;

                case 'quitter':
                    echo "👋 Au revoir\n";
                    exit;

                default:
                    echo "❌ Commande inconnue\n";
            }
        }
    }

    private function aide(): void
    {
        echo "\nCommandes disponibles :\n";
        echo " aide      → afficher les commandes d'aide\n";
        echo " lister    → afficher tous les contacts\n";
        echo " supprimer → supprimer les contacts\n";
        echo " quitter   → quitter l’application\n\n";
    }

    private function listerContacts(): void
    {
        $contacts = $this->contactManager->findAll();

        echo "📇 Liste des contacts :\n";
        foreach ($contacts as $contact) {
            echo "- {$contact['id']} | {$contact['name']} | {$contact['email']}\n";
        }
        echo "\n";
    }
}

/* ==========================
   LANCEMENT
   ========================== */
$app = new Application();
$app->run();
