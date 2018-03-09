<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends Frontend_Controller
{
    public function customer_orders()
    {
        $navbarData = $this->pageData['navbarData'];

        $this->load->view('default/head');
        $this->load->view('default/navbar', $navbarData);
        $this->load->view('default/topbar');
        $this->load->view('customer/customer_orders');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

    public function customer_account()
    {
        $navbarData = $this->pageData['navbarData'];

        $this->load->view('default/head');
        $this->load->view('default/navbar', $navbarData);
        $this->load->view('default/topbar');
        $this->load->view('customer/customer_account');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

    public function customer_order()
    {
        $navbarData = $this->pageData['navbarData'];

        $this->load->view('default/head');
        $this->load->view('default/navbar', $navbarData);
        $this->load->view('default/topbar');
        $this->load->view('customer/customer_order');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

    public function customer_wishlist()
    {
        $navbarData = $this->pageData['navbarData'];

        $this->load->view('default/head');
        $this->load->view('default/navbar', $navbarData);
        $this->load->view('default/topbar');
        $this->load->view('customer/customer_wishlist');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

    public function register()
    {
        $navbarData = $this->pageData['navbarData'];

        $this->load->view('default/head');
        $this->load->view('default/navbar', $navbarData);
        $this->load->view('default/topbar');
        $this->load->view('customer/register');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}