<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Product extends CI_Controller
{
    public function detail($id)
    {
        $this->load->model('productFrontend');
        $data = $this->productFrontend->getProductById($id);

        $this->load->model('category');
        $navbarData = $this->category->getAllCategories();

        $categories = ['navbarData'=>$navbarData];

        $this->load->view('default/head');
        $this->load->view('default/topbar');
        $this->load->view('default/navbar', $categories);

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