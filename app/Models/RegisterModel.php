<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'user_id', 'city', 'address', 'code', 'school', 'status', 'transcript', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
