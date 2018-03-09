<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Homepage extends Frontend_Controller
{
    public function index()
    {
        $navbarData = $this->pageData['navbarData'];

        $this->load->view('default/head');
        $this->load->view('default/navbar', $navbarData);
        $this->load->view('default/topbar');
        $this->load->view('homepage/content');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}