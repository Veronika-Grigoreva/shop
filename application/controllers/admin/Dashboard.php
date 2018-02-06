<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = ['title' => 'Dashboard'];

        $this->load->view('admin/default/head');
        $this->load->view('admin/default/sidebar');
        $this->load->view('admin/default/navbar');
        $this->load->view('admin/dashboard/content');
        $this->load->view('admin/default/footer');
        $this->load->view('admin/default/scripts');
    }
}
