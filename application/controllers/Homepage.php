<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Homepage extends CI_Controller
{
    public function index()
    {
        $this->load->view('default/head');
        $this->load->view('default/navbar');
        $this->load->view('default/topbar');
        $this->load->view('homepage/content');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}