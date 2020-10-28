<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class PizzaClass extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load cart class and pizza model
        //$this->load->library('cart');
        $this->load->model('PizzaModel');
        $this->load->model('CartModel');
    }

    public function index()
    {
        $listAllPizza = array();
        $listAllPizza['pizzas'] = $this->PizzaModel->getAllPizza();//check all pizza
        $this->load->view('pizza', $listAllPizza);
    }


    public function addToCart($proID)
    {
        $pizza = $this->PizzaModel->getPizzaById($proID);
        $data = array(
            'id' => $pizza['id'],
            'qty' => 1,
            'price' => $pizza['price'],
            'name' => $pizza['name'],
            'image' => $pizza['image'],
            'type' => $pizza['type']
        );

        //add to cart class to data(array)
        $this->CartModel->insert($data);
        //print_r($data);
        // Redirect to the cart page
        redirect('Homepage/cart');


    }

}