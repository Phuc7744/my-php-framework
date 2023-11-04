<?php
class Database extends PDO
{
    public function __construct($connect, $username, $password)
    {
        parent::__construct($connect, $username, $password);
    }

    public function insert($tbl, $data)
    {
        $keys = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $tbl($keys) VALUES ($values)";
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function select($sql, $data = array(), $fecthType = PDO::FETCH_ASSOC)
    {
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAll($tbl)
    {
        $sql = "SELECT * FROM $tbl";
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectById($tbl, $id)
    {
        $sql = "SELECT * FROM $tbl WHERE id=$id";
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($tbl, $data, $cond)
    {
        $updateKeys = null;
        foreach ($data as $key => $value) {
            $updateKeys .= "$key=:$key";
        }
        $updateKeys = rtrim($updateKeys, ",");

        $sql = "UPDATE $tbl SET $updateKeys WHERE $cond";
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function delete($tbl, $cond, $limit = 1)
    {
        $sql = "DELETE FROM $tbl WHERE $cond LIMIT $limit";
        return $this->exec($sql);
    }

    public function deleteById($tbl, $id)
    {
        $sql = "DELETE FROM $tbl WHERE id=$id";
        return $this->exec($sql);
    }
}
?>