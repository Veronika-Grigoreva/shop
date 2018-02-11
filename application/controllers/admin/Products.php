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
        $this->pageData['pageInformation']['pageTitle'] = 'Products';
        $this->pageData['jsSettings']['activeMenuItem'] = 'products';
        $this->pageData['gridCollection'] = $this->productModel->getCollection();

        $this->load->view('admin/default/head', $this->pageData);
        $this->load->view('admin/default/sidebar', $this->pageData);
        $this->load->view('admin/default/navbar', $this->pageData);
        $this->load->view('admin/default/page_system_information', $this->pageData);
        $this->load->view('admin/products/grid', $this->pageData);
        $this->load->view('admin/default/footer', $this->pageData);
        $this->load->view('admin/default/scripts', $this->pageData);
    }

    public function item($id)
    {
        if ($id) {
            $this->pageData['pageInformation']['pageTitle'] = 'Edit product';
            $this->pageData['itemData'] = $this->productModel->load($id);
        } else {
            $this->pageData['pageInformation']['pageTitle'] = 'New product';
        }

        $this->pageData['jsSettings']['activeMenuItem'] = 'products';
        $this->pageData['gridCollection'] = $this->productModel->getCollection();

        $this->load->view('admin/default/head', $this->pageData);
        $this->load->view('admin/default/sidebar', $this->pageData);
        $this->load->view('admin/default/navbar', $this->pageData);
        $this->load->view('admin/default/page_system_information', $this->pageData);
        $this->load->view('admin/products/edit', $this->pageData);
        $this->load->view('admin/default/footer', $this->pageData);
        $this->load->view('admin/default/scripts', $this->pageData);
    }

    public function uploadImage()
    {
        $config['upload_path']          = 'img/cms/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            echo json_encode($this->upload->data());
        }
    }

    public function save($id = null){

        if ($this->productModel->load($id)) {
            $this->productModel->setData($this->input->post());
            if ($this->productModel->save()) {
                $this->session->set_flashdata('success', ['message' => 'Product has been saved']);
                redirect('admin/products', 'refresh');
            }
        }

        exit;
    }
}

