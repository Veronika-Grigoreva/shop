<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Categories extends CI_Controller
{
    public function category()
    {
        $this->load->view('default/head');
        $this->load->view('default/topbar');
        $this->load->view('default/navbar');
        $this->load->view('categories/category');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}