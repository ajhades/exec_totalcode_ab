<?php

namespace App\Models;

use App\Database;
use PDO;

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }
}