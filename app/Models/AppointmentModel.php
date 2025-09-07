<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'id',
        'serviceId',
        'staffId',
        'customerId',
        'date',
        'startUtc',
        'endUtc',
        'status'
    ];

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
