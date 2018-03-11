<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('admin/category', 'categoryModel');
    }

    public function grid()
    {
        $this->pageData['pageInformation']['pageTitle'] = 'Categories';
        $this->pageData['jsSettings']['activeMenuItem'] = 'categories';
        $this->pageData['gridCollectionHtml'] = $this->categoryModel->getCollection()
            ->prepareCategoriesCollection()
            ->getCategoriesGridHtml();
        ;


        $this->load->view('admin/default/head', $this->pageData);
        $this->load->view('admin/default/sidebar', $this->pageData);
        $this->load->view('admin/default/navbar', $this->pageData);
        $this->load->view('admin/default/page_system_information', $this->pageData);
        $this->load->view('admin/categories/grid', $this->pageData);
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
}

