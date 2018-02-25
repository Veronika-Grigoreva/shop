<?php

class Category extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function getAllCategories()
    {
        $query = $this->db->get('categories_id');
        $result = $query->result();
        if (empty($result)) {
            return false;
        }

        return $result;

    }

}