<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cms extends Frontend_Controller
{
    public function contact()
    {
        $navbarData = $this->pageData['navbarData'];

        $this->load->view('default/head');
        $this->load->view('default/navbar', $navbarData);
        $this->load->view('default/topbar');
        $this->load->view('cms/contact');
        $this->load->view('default/copyright');
        $this->load->view('cms/script');
    }

    public function not_found()
    {
        $navbarData = $this->pageData['navbarData'];

        $this->load->view('default/head');
        $this->load->view('default/navbar', $navbarData);
        $this->load->view('default/topbar');
        $this->load->view('cms/not_found');
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}
