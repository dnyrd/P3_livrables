<?php

class DBConnect
{
    private ?PDO $pdo = null;

    public function getPDO(): ?PDO
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO(
                    'mysql:host=localhost;dbname=openclassrooms_p3;charset=utf8',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                echo "❌ Erreur connexion BDD : " . $e->getMessage() . PHP_EOL;
                return null;
            }
        }

        return $this->pdo;
    }
}

