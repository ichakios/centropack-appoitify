<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffShiftModel extends Model
{
    protected $table = 'staff_shifts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false; // Set to true if you have created_at/updated_at
    protected $allowedFields = ['id', 'staffId', 'weekday', 'startTime', 'endTime'];
}
