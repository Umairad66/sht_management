<?php

class Models
{
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->pdo = $GLOBALS['pdo'];
        $this->table = $table;
    }

    // Create a new record
    public function create($data)
    {
        // Check if any field in $data contains a password
        foreach ($data as $key => $value) {
            if (strpos($key, 'password') !== false) {
                $data[$key] = password_hash($value, PASSWORD_DEFAULT);
            }
        }

        // Construct the SQL query
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
        // Prepare and execute the SQL query
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);

        // Return the last inserted ID
        return $this->pdo->lastInsertId();
    }

    // Get all data from db
    public function read_all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data)
            return [];
        return $data;
    }

    // Read a record by ID
    public function read($field, $value)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$field} = :value";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['value' => $value]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a record by ID
    public function update($id, $data, $where_column)
    {
        $columns = '';
        foreach ($data as $key => $value) {
            $columns .= $key . ' = :' . $key . ', ';
        }
        $columns = rtrim($columns, ', ');
        $sql = "UPDATE {$this->table} SET {$columns} WHERE {$where_column} = :id";
        $data['id'] = $id;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }

    // Delete a record by ID
    public function delete($id, $where_column)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$where_column} = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}



// Example usage:
// $crud = new Models('users');

// // Create a new record
// $newUserId = $crud->create(['name' => 'John', 'email' => 'john@example.com']);
// echo "New user ID: " . $newUserId . "\n";

// // Read a record by ID
// $user = $crud->read($column, $value);
// print_r($user);

// // Update a record
// $crud->update($newUserId, ['name' => 'Jane', 'email' => 'jane@example.com']);

// // Delete a record
// $deletedRows = $crud->delete($newUserId);
// echo "Deleted rows: " . $deletedRows . "\n";
