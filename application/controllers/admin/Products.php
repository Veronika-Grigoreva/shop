<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('admin/product', 'productModel');
    }

    public function grid()
    {
        $this->pageData['pageData']['pageTitle'] = 'Products';
        $this->pageData['jsSettings']['activeMenuItem'] = 'products';
        $this->pageData['gridCollection'] = $this->productModel->getCollection();

        $this->load->view('admin/default/head', $this->pageData);
        $this->load->view('admin/default/sidebar', $this->pageData);
        $this->load->view('admin/default/navbar', $this->pageData);
        $this->load->view('admin/products/grid', $this->pageData);
        $this->load->view('admin/default/footer', $this->pageData);
        $this->load->view('admin/default/scripts', $this->pageData);
    }
}
