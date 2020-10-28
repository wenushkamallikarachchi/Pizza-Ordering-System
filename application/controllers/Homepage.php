<?php


class Homepage extends CI_Controller
{

    public function cart(){
        $this->load->view('cart');
    }
    public function pizza(){
        $this->load->view('pizza');
    }
    public function checkout(){
        $this->load->view('checkout');
    }
    public function checkoutPass(){
        $this->load->view('orderPass');
    }
    public function appetizer(){
        $this->load->view('appetizer');
        $this->load->PizzaClass;
    }
}