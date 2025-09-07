<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessHourModel extends Model
{
    protected $table = 'business_hours';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['id', 'dayOfWeek', 'openTime', 'closeTime'];

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
