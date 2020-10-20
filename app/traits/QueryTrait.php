<?php

namespace App\Traits;

use App\Models\Model;
use PDOException;

trait QueryTrait
{
    // Bind values
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }

        return $this->stmt->bindValue($param, $value, $type);
    }

    public function select($fetchAll = true)
    {
        try {
            $query = "SELECT * FROM " . Model::$table;
            $this->stmt = Model::$conn->prepare($query);
            $this->stmt->execute();

            // Fetch results
            $result = $fetchAll ? $this->stmt->fetchAll() : $this->stmt->fetch();

            $this->stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function insert(array $data)
    {
        try {
            $fields = implode(',', array_keys($data));
            $places = ':' . implode(',:', array_keys($data));

            $query = "INSERT INTO " . Model::$table . " ({$fields}) VALUES ({$places})";

            $this->stmt = Model::$conn->prepare($query);
            foreach ($data as $name => $value) {
                $this->bind(":{$name}", $value);
            }
            $this->stmt->execute();
            $this->stmt->closeCursor();

            return Model::$conn->lastInsertId();
        
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function update(array $data, array $id)
    {
        try {
            // Destruct id
            // list($idKey, $idVal) = $id;
            $idKey = array_keys($id)[0];
            $idVal = array_values($id)[0];

            $query = "UPDATE " . Model::$table . " SET";
            foreach ($data as $field => $value) {
                $query .= " {$field} = :{$field},";
            }

            $query = rtrim($query, ",");
            $query .= " WHERE {$idKey} = :idKey";

            $this->stmt = Model::$conn->prepare($query);

            foreach ($data as $field => $value) {
                $this->bind(":{$field}", $value);
            }

            // Bind id values
            $this->bind(":idKey", $idVal);

            $this->stmt->execute();
            $this->stmt->closeCursor();
            $this->stmt->fetch();

            $result = $this->stmt->rowCount();

            return $result;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function delete(array $data)
    {
        try {
            $query = "DELETE FROM " . Model::$table . " WHERE";

            foreach ($data as $field => $value) {
                $query .= " {$field} = :{$field} AND";
            }

            $query = rtrim($query, "AND");
            $this->stmt = Model::$conn->prepare($query);

            foreach ($data as $field => $value) {
                $this->bind(":{$field}", $value);
            }

            $this->stmt->execute();
            $this->stmt->closeCursor();

            $result = $this->stmt->rowCount();
            return $result;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function customQuery($query, array $data = null, $fetchAll = true)
    {
        try {
            $this->stmt = Model::$conn->prepare($query);
            if ($data) {
                foreach ($data as $field => $value) {
                    $this->bind(":{$field}", $value);
                }
            }

            $this->stmt->execute();

            $rowCount = $this->stmt->rowCount();

            // Fetch results
            $result = $fetchAll ? $this->stmt->fetchAll() : $this->stmt->fetch();

            $this->stmt->closeCursor();

            return $result;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
