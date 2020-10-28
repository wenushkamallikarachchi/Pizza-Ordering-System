<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class PizzaModel extends CI_Model
{
    function __construct()
    {
        $this->pizzaTable = 'pizza';
        $this->appetizerTable = 'appetizers';
        $this->customerTable = 'users';
        $this->orderTable = 'orders';
        $this->orderItemsTable = 'order_items';
    }


    //get all pizza from DB
    public function getAllPizza()
    {
        $this->db->select('*');
        $this->db->from($this->pizzaTable);
        $this->db->where('status', '1');
        $this->db->order_by('name');
        $query = $this->db->get();
        $result = $query->result_array();
        // Return  data
        return !empty($result) ? $result : false;
    }


    //get the pizza by id
    public function getPizzaById($id = '')
    {
        if ($id) {
            $this->db->select('*');
            $this->db->from($this->pizzaTable);

            $this->db->where('id', $id);

            $query = $this->db->get();
            $result = $query->row_array();
        }
        // Return  data
        return !empty($result) ? $result : false;

        // Return  data
        return !empty($result) ? $result : false;


    }


    //get oder detail from DB
    public function getOrderDetail($id)
    {

        $this->db->select('order.*, cus.name, cus.email, cus.phone, cus.address');
        $this->db->from($this->orderTable . ' as order');
        $this->db->join($this->customerTable . ' as cus', 'cus.id = order.customer_id', 'left');
        $this->db->where('order.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();

        // fetch order items Details from DB
        $this->db->select('item.*, pizza.image, pizza.name, pizza.price');
        $this->db->from($this->orderItemsTable . ' as item');
        $this->db->join($this->pizzaTable . ' as pizza', 'pizza.id = item.product_id', 'left');
        $this->db->where('item.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0) ? $query2->result_array() : array();

        return !empty($result)?$result:false;
    }


//insert user detail to DB
    public function insertCustomer($data)
    {
        // Insert customer data
        $insert = $this->db->insert($this->customerTable, $data);

        // Return the status
        if ($insert) {

            return $this->db->insert_id();
        } else {
            return false;
        }

    }


    // Insert order data to DB
    public function insertOrder($data)
    {
        // if there is no create and modified data : add create and modified data

        $insert = $this->db->insert($this->orderTable, $data);

        // Return the status

        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }


    // Insert order detail data to DB
    public function insertOrderItems($data = array())
    {


        // Insert order items
        $insert = $this->db->insert_batch($this->orderItemsTable, $data);

        // Return the status
        if ($insert) {
            return true;
        } else {
            return flase;
        }
    }
}