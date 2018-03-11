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
        $this->pageData['gridCollection'] = $this->productModel->getCollection()->getData();

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
            $this->pageData['itemData'] = $this->productModel->load($id)->getData();
        } else {
            $this->pageData['pageInformation']['pageTitle'] = 'New product';
        }

        $productCategories = $this->productModel->prepareProductCategories($this->pageData['itemData']);
        $this->pageData['jsSettings']['activeMenuItem'] = 'products';
        $this->pageData['additionalInfo']['categories'] = $productCategories;
        $this->pageData['additionalInfo']['brands'] = '';
        $this->pageData['additionalInfo']['colours'] = '';

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

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            echo json_encode($this->upload->data());
        }
    }

    public function save($id = null)
    {
        $productData = $this->input->post();

        if (!isset($productData['categories'])) {
            $productData['categories'] = array();
        }

        if ($id && $this->productModel->load($id)) {
            $this->productModel->setData($productData);
        } else {
            $this->productModel->setData($productData);
        }

        if ($this->productModel->save()) {
            $this->session->set_flashdata('success', ['message' => 'Product has been saved']);
            redirect('admin/products', 'refresh');
        }

        exit;
    }

    public function delete($id = null)
    {
        if ($id && $this->productModel->load($id)) {
            if ($this->productModel->delete()) {
                $this->session->set_flashdata('success', ['message' => 'Product has been deleted']);
                redirect('admin/products', 'refresh');
            } else {
                $this->session->set_flashdata('error', ['message' => 'Something went wrong. Cannot delete product']);
                redirect('admin/products', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', ['message' => 'Cannot delete unknown product']);
            redirect('admin/products', 'refresh');
        }

        exit;
    }
}

