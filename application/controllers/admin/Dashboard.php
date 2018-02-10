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
        $this->pageData['pageInformation']['pageTitle'] = 'Dashboard';
        $this->pageData['jsSettings']['activeMenuItem'] = 'dashboard';

        $this->load->view('admin/default/head', $this->pageData);
        $this->load->view('admin/default/sidebar', $this->pageData);
        $this->load->view('admin/default/navbar', $this->pageData);
        $this->load->view('admin/default/page_system_information', $this->pageData);
        $this->load->view('admin/dashboard/content', $this->pageData);
        $this->load->view('admin/default/footer', $this->pageData);
        $this->load->view('admin/default/scripts', $this->pageData);
    }
}
