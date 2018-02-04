<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Checkout extends CI_Controller
{
    public function checkout1()
    {
        $this->load->view('default/head');
        $this->load->view('default/topbar');
        $this->load->view('default/navbar');
        $this->load->view('checkout/checkout1');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

    public function checkout2()
    {
        $this->load->view('default/head');
        $this->load->view('default/topbar');
        $this->load->view('default/navbar');
        $this->load->view('checkout/checkout2');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');

    }

    public function checkout3()
    {
        $this->load->view('default/head');
        $this->load->view('default/topbar');
        $this->load->view('default/navbar');
        $this->load->view('checkout/checkout3');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');

    }

    public function checkout4()
    {
        $this->load->view('default/head');
        $this->load->view('default/topbar');
        $this->load->view('default/navbar');
        $this->load->view('checkout/checkout4');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');

    }
}