<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function customer_orders()
    {
        $this->load->view('default/head');
        $this->load->view('default/navbar');
        $this->load->view('default/topbar');
        $this->load->view('customer/customer_orders');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

    public function customer_account()
    {
        $this->load->view('default/head');
        $this->load->view('default/navbar');
        $this->load->view('default/topbar');
        $this->load->view('customer/customer_account');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

    public function customer_order()
    {
        $this->load->view('default/head');
        $this->load->view('default/navbar');
        $this->load->view('default/topbar');
        $this->load->view('customer/customer_order');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

    public function customer_wishlist()
    {
        $this->load->view('default/head');
        $this->load->view('default/navbar');
        $this->load->view('default/topbar');
        $this->load->view('customer/customer_wishlist');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

    public function register()
    {
        $this->load->view('default/head');
        $this->load->view('default/navbar');
        $this->load->view('default/topbar');
        $this->load->view('customer/register');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}