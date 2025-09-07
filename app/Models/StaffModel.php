<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false; // Set true if you have created_at/updated_at
    protected $allowedFields = ['id', 'name', 'active'];

    // Optional: automatically generate UUID
    protected $beforeInsert = ['generateId'];

    protected function generateId(array $data)
    {
        if (!isset($data['data']['id'])) {
            $data['data']['id'] = bin2hex(random_bytes(16)); // 32-char hex string
        }
        return $data;
    }
}
