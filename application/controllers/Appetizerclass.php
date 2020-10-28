<?php


class Appetizerclass extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        // Load cart class and pizza model
        $this->load->library('cart');
        $this->load->model('AppetizerModel');

    }
    public function index(){
        $listAllAppetizer=array();
        $listAllAppetizer['appetizers'] =$this->AppetizerModel->getAllAppetizer();//check all Appetizer
        $this->load->view('appetizer', $listAllAppetizer);
    }

}