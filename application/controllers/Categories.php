<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Categories extends Frontend_Controller
{
    public function category($id)
    {
        $navbarData   = $this->pageData['navbarData'];
        $categoryData = [
            'currentCategoryId' => $id
        ];

        $this->load->view('default/head');
        $this->load->view('default/topbar');
        $this->load->view('default/navbar', $navbarData);
        $this->load->view('categories/category', $categoryData);
        $this->load->view('default/footer');
        $this->load->view('default/copyright');
        $this->load->view('default/scripts');
    }

}