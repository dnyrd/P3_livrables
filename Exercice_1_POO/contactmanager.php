<?php


/* ==========================
   CONTACT MANAGER
   ========================== */
class ContactManager
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBConnect::connect();
    }

    /**
     * Récupère tous les contacts
     * @return array
     */
    public function findAll(): array
    {
        $sql = "SELECT * FROM contact";
        $stmt = $this->db->query($sql);

        $contacts = $stmt->fetchAll();

        // 🔍 Test immédiat du résultat (demandé dans l’énoncé)
        // echo "\n=== TEST findAll() ===\n";
        // print_r($contacts);
        // echo "=====================\n\n";

        return $contacts;
    }
}