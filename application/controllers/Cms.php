<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cms extends CI_Controller
{
    public function contact()
    {
        $this->load->view('default/head');
        $this->load->view('default/navbar');
        $this->load->view('default/topbar');
        $this->load->view('cms/contact');
        $this->load->view('default/copyright');
        $this->load->view('cms/script');
    }

    public function not_found()
    {
        $this->load->view('default/head');
        $this->load->view('default/navbar');
        $this->load->view('default/topbar');
        $this->load->view('cms/not_found');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}
