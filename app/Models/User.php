<?php

declare(strict_types=1);

namespace App\Models;

class User extends BaseModel
{
    public function create(array $data): int
    {
        $stmt = $this->db->prepare('INSERT INTO users (name,email,password,role,created_at) VALUES (:name,:email,:password,:role,NOW())');
        $stmt->execute($data);

        return (int) $this->db->lastInsertId();
    }
}
