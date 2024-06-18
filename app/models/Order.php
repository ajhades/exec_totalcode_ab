<?php

namespace App\Models;

use PDO;
use Exception;

class Order extends BaseModel
{
    protected $table = 'orders';

    /**
     * Get all orders from the database.
     *
     * @return array
     */
    public function getAllOrders()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }
}