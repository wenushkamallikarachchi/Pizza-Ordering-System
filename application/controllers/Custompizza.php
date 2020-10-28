<?php


class Custompizza extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        // Load form library & helper
        $this->load->library('form_validation');
        $this->load->helper('form');
        // Load cart library
        $this->load->library('cart');

    }
  public  function index()
    {
        $submit = $this->input->post('addtocart');
        if (isset($submit)) {
            $customMenu = array(
           'name'    => 'Customize Pizza',
                'id'=>'customPizza1',
                'qty'=>1,
                'price'=> 3000
            );
            $this->cart->insert($customMenu);

            //add to cart class to data(array)
            print_r($customMenu);
            // Redirect to the cart page
   redirect('Homepage/cart');
        }
        else{
            echo"Error with your custom pizza!We're sorry";
        }






}
}