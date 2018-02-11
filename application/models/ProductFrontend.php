<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductFrontend extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function getProductById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('product');
        $result = $query->result();
        if (empty($result)) {
            return false;
        }
        $result = $result[0];

        $result->newprice = $result->price - $result->price * ((int)$result->sale / 100);
        $result->image = '/img/cms/products/' . $result->image;

        if (!file_exists(FCPATH . $result->image) || !is_file(FCPATH . $result->image)) {
            $result->image = '/img/cms/products/default.jpg';
        }

        return $result;
    }

}