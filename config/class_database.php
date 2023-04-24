<?php

class Class_Database
{
    private $conn;
    public function __construct()
    {
        include_once "../config/connect_database.php";
        $connect_db = new Connect_Database_PDO();
        $this->conn = $connect_db->connect;
    }

    public function Query($sql, $param)
    {
        try {
            $stmt = $this->conn->prepare($sql);
            if (count($param) == 0) {
                $stmt->execute();
            } else {
                $stmt->execute($param);
            }
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($results);
            return $json;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Insert($sql, $param)
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($param);
            if ($stmt->rowCount() >= 1) {
                return 1;
            } else {
                $errors = $stmt->errorInfo();
                return $errors[2] . ", " . $errors[1] . " ," . $errors[0];
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function InsertLastID($sql, $param)
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($param);
            if ($stmt->rowCount() >= 1) {
                $lastId = $this->conn->lastInsertId();
                return $lastId;
            } else {
                $errors = $stmt->errorInfo();
                echo $errors[2] . ", " . $errors[1] . " ," . $errors[0];
                return 0;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Update($sql, $param)
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($param);
            if ($stmt) {
                return 1;
            } else {
                return 'Error updating table.';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete($sql, $param)
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($param);
            if ($stmt) {
                return 1;
            } else {
                return 'Error deleting table.';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
