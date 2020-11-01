<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartclass extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load cart class and pizza model
        $this->load->model('PizzaModel');
        $this->load->model('CartModel');
    }

  public  function index()
    {
        $data = array();
        $data['cartItems'] = $this->CartModel->contents();
        $data['cartmodel'] = $this->CartModel;
        $this->load->view('cart', $data);
    }

    public  function updatePizzaQty()
    {
        $count = 0;
        //get item id and the qty
        $itemid = $this->input->get('rowid');
        $qty = $this->input->get('qty');

        // Update item in the cart
        if (!empty($itemid) && !empty($qty)) {
            $data = array(
                'rowid' => $itemid,
                'qty' => $qty
            );
            $count = $this->CartModel->update($data);
        }

        // Return response
        echo $count ? 'ok' : 'err';
    }
    public function deleteItem($rowid){
        // delete the selected  item from cart
        $delete = $this->CartModel->remove($rowid);
        redirect('Cartclass/');
    }

}