<?php
/** @noinspection PdoApiUsageInspection */

/** @noinspection SqlNoDataSourceInspection */

namespace Core;

use Exception;
use PDO;
use PDOException;
use RuntimeException;

abstract class ModelPDO
{

    protected PDO $pdo;
    protected ?string $tableName = null;

    public function __construct()
    {
        $this->pdo = $this->make();
        $this->checkTable();
    }

    /**
     * @throws PDOException
     */
    protected function make(): PDO
    {
        try {
            return new PDO("mysql:host=localhost;dbname=mvcProject", "root", "");
        } catch (PDOException $e) {
            throw new PDOException("database connection error: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function selectAll(): bool|array
    {
        if (is_null($this->tableName)) {
            throw new RuntimeException("table name not null");
        }
        $stmt = $this->pdo->prepare("SELECT * FROM $this->tableName");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function checkTable(): void
    {
        $stmt = $this->pdo->prepare("SHOW TABLES LIKE '$this->tableName'");
        $stmt->execute();
        if ($stmt->fetch() === false) {
            throw new RuntimeException($this->tableName." table not exists");
        }
    }

}