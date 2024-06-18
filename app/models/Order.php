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

    /**
     * Get all orders by month created.
     *
     * @return array
     */
    public function getOrdersByMonthCreated($month)
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} WHERE MONTH(date_placed) = $month");
        return $stmt->fetchAll();
    }
    /**
     * Get all orders by status.
     *
     * @return array
     */
    public function getOrdersByStatus($status)
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} WHERE status = $status");
        return $stmt->fetchAll();
    }
}