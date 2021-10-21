<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolModel extends Model
{
    protected $table = 'school';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name'];
    protected $useTimestamps = false;
}
