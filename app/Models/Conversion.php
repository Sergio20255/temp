<?php

declare(strict_types=1);

namespace App\Models;

class Conversion extends BaseModel
{
    public function create(array $data): int
    {
        $stmt = $this->db->prepare('INSERT INTO conversions (user_id,file_id,from_format,to_format,status,created_at) VALUES (:user_id,:file_id,:from_format,:to_format,:status,NOW())');
        $stmt->execute($data);

        return (int) $this->db->lastInsertId();
    }

    public function markCompleted(int $id, string $outputPath): void
    {
        $stmt = $this->db->prepare('UPDATE conversions SET status = :status, output_path=:output_path, completed_at = NOW() WHERE id = :id');
        $stmt->execute(['status' => 'completed', 'output_path' => $outputPath, 'id' => $id]);
    }
}
