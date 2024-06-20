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

    /**
     * Get statuses lists.
     *
     * @return array
     */
    public function getStatusLists()
    {
        $status = array(
            ['id' =>null, 'name' => 'Todos'],
            ['id' =>0, 'name' => 'abiertas'],
            ['id' =>3, 'name' => 'enviadas'],
            ['id' =>4, 'name' => 'entregadas']
        );
        return $status;
    }
    /**
     * Get lists months.
     *
     * @return array
     */
    public function getMonths()
    {
        $months = array(
            ['id' => 0, 'name'=> "Todos"],
            ['id' => 1, 'name'=> "Enero"],
            ['id' => 2, 'name'=> "Febrero"],
            ['id' => 3, 'name'=> "Marzo"],
            ['id' => 4, 'name'=> "Abril"],
            ['id' => 5, 'name'=> "Mayo"],
            ['id' => 6, 'name'=> "Junio"],
            ['id' => 7, 'name'=> "Julio"],
            ['id' => 8, 'name'=> "Agosto"],
            ['id' => 9, 'name'=> "Septiembre"],
            ['id' => 10, 'name'=> "Octubre"],
            ['id' => 11, 'name'=> "Noviembre"],
            ['id' => 12, 'name'=> "Diciembre"],
        );
        return $months;
    }
}