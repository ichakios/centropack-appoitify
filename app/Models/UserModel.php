<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password', 'role'];
    protected $returnType    = 'array';
    protected $useTimestamps = false;

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[255]|is_unique[users.username,id,{id}]',
        'password' => 'required|min_length[6]',
        'role'     => 'required|in_list[admin,staff]',
    ];
}
