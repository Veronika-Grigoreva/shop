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
            $this->pageData['itemData'] = $this->categoryModel->load($id)->getData();
        } else {
            $this->pageData['pageInformation']['pageTitle'] = 'New product';
            $this->pageData['itemData'] = $this->categoryModel->getData();
        }

        $this->pageData['jsSettings']['activeMenuItem'] = 'categories';

        $this->load->view('admin/default/head', $this->pageData);
        $this->load->view('admin/default/sidebar', $this->pageData);
        $this->load->view('admin/default/navbar', $this->pageData);
        $this->load->view('admin/default/page_system_information', $this->pageData);
        $this->load->view('admin/categories/edit', $this->pageData);
        $this->load->view('admin/default/footer', $this->pageData);
        $this->load->view('admin/default/scripts', $this->pageData);
    }

    public function save($id = null)
    {
        $categoryData = $this->input->post();

        if ($id && $this->categoryModel->load($id)) {
            $this->categoryModel->setData($categoryData);
        } else {
            $this->categoryModel->setData($categoryData);
        }

        if ($this->categoryModel->save()) {
            $this->session->set_flashdata('success', ['message' => 'Category has been saved']);
            redirect('admin/categories', 'refresh');
        }

        exit;
    }

    public function delete($id = null)
    {
        if ($id && $this->categoryModel->load($id)) {
            if ($this->categoryModel->delete()) {
                $this->session->set_flashdata('success', ['message' => 'Category has been deleted']);
                redirect('admin/categories', 'refresh');
            } else {
                $this->session->set_flashdata('error', ['message' => 'Something went wrong. Cannot delete category']);
                redirect('admin/categories', 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', ['message' => 'Cannot delete unknown category']);
            redirect('admin/categories', 'refresh');
        }

        exit;
    }
}

