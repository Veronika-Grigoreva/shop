<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Product extends Frontend_Controller
{
    public function detail($id)
    {
        $this->load->model('productFrontend');
        $data = $this->productFrontend->getProductById($id);
        $navbarData = $this->pageData['navbarData'];

        $this->load->view('default/head');
        $this->load->view('default/topbar');
        $this->load->view('default/navbar', $navbarData);

        if ($data) {
            $this->load->view('product/detail', $data);
        } else {
            $this->load->view('cms/not_found');
        }

        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}