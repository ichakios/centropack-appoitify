<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false; // Set true if you have created_at/updated_at
    protected $allowedFields = ['id', 'firstName', 'lastName', 'email', 'phone'];

    // Automatically generate UUID before insert
    protected $beforeInsert = ['generateId'];

    protected function generateId(array $data)
    {
        if (!isset($data['data']['id'])) {
            $data['data']['id'] = bin2hex(random_bytes(16)); // 32-char hex string
        }
        return $data;
    }
}
