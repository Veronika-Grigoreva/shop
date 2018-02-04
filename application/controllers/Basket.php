<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Basket extends CI_Controller
{
    public function cart()
    {
        $this->load->view('default/head');
        $this->load->view('default/topbar');
        $this->load->view('default/navbar');
        $this->load->view('basket/cart');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}