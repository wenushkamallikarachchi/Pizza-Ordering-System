<?php


class AppetizerModel extends CI_Model
{

    function __construct()
    {
        $this->appetizerTable='appetizers';
        $this->customerTable = 'users';
        $this->orderTable = 'orders';
        $this->orderItemsTable = 'order_items';
    }
    function getAllAppetizer(){
        {
            $this->db->select('*');
            $this->db->from($this->appetizerTable);
            $this->db->where('status', '1');
            $this->db->order_by('name');
            $query = $this->db->get();
            $result = $query->result_array();
            // Return  data
            return !empty($result)?$result:false;
        }
    }



}