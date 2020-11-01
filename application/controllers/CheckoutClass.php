<?php
defined('BASEPATH') or exit('No direct script access allowed');


class CheckoutClass extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load form library & helper
        $this->load->library('form_validation');
        $this->load->helper('form');



        // Load product model
        $this->load->model('PizzaModel');
        $this->load->model('CartModel');
        $this->controller = 'CheckoutClass';
    }

    function index()
    {
        // Redirect if the cart is empty
        if ($this->CartModel->total_items() <= 0) {
            redirect('PizzaClass');
        }

        $custData = $data = array();

        // If order request is submitted
        $submit = $this->input->post('placeOrder');
        if (isset($submit)) {
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');

            // Prepare customer data
            $custData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'phone' => strip_tags($this->input->post('phone')),
                'address' => strip_tags($this->input->post('address'))
            );

            // Validate submitted form data
            if ($this->form_validation->run() == true) {
                // Insert customer data
                $insert = $this->PizzaModel->insertCustomer($custData);

                if ($insert) {
                    // Insert order
                    $order = $this->placeOrder($insert);

                    // If the order submission is successful
                    if ($order) {

                        $this->session->set_userdata('pass_message', ' successfully Order placed .');
                        redirect('CheckoutClass/orderPass/' . $order);
                    } else {
                        $data['fail_message'] = 'Order submission failed, please try again.';
                    }
                } else {
                    $data['fail_message'] = 'Some problems occured, please try again.';
                }
            }
        }

        // Customer data
        $data['userData'] = $custData;

        // Retrieve cart data from the session
        $data['cartItems'] = $this->CartModel->contents();

        // Pass products data to the view
        $this->load->view('checkout', $data);
    }


    public function orderPass($ordID)
    {

        // Fetch order data from the database
        $data['order'] = $this->PizzaModel->getOrderDetail($ordID);

        // Load order details view
        $this->load->view('orderPass', $data);

    }


    public function placeOrder($custID)
    {
        // Insert order data
        $orderData = array(
            'customer_id' => $custID,
            'grand_total' => $this->cart->total(),

        );

        $order = $this->PizzaModel->insertOrder($orderData);
        if ($order) {
//            // Retrieve cart data from the session
            $cartItems = $this->CartModel->contents();
            print_r($cartItems);
            // CartModel items
            $orderItemData = array();
            $i = 0;
            foreach ($cartItems as $item) {
                $orderItemData[$i]['order_id'] = $order;
                $orderItemData[$i]['product_id'] = $item['id'];
                $orderItemData[$i]['quantity'] = $item['qty'];
                $orderItemData[$i]['sub_total'] = $item["subtotal"];
                $i++;
            }

            if (!empty($orderItemData)) {
                // Insert order items
                $insertOrderItems = $this->PizzaModel->insertOrderItems($orderItemData);

                if ($insertOrderItems) {
                    // Remove items from the cart
                    $this->CartModel->destroy();

                    // Return order ID
                    return $order;
                }

            }

        }
        return false;
    }
}