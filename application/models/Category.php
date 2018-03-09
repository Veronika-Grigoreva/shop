<?php

class Category extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    protected function getPreparedCategories($categories)
    {
        $preparedCategories = array();

        foreach ($categories as $item) {
            if (!$item->parent_category_id) {
                $preparedCategories[$item->id] = $item;
                $preparedCategories[$item->id]->children = array();

                foreach ($categories as $item2) {
                    if ($item2->parent_category_id == $item->id) {
                        $preparedCategories[$item->id]->children[$item2->id] = $item2;
                        $preparedCategories[$item->id]->children[$item2->id]->children = array();

                        foreach ($categories as $item3) {
                            if ($item3->parent_category_id == $item2->id) {
                                $preparedCategories[$item->id]->children[$item2->id]->children[$item3->id] = $item3;
                            }
                        }
                    }
                }
            }
        }

        return $preparedCategories;
    }

    public function getAllCategories()
    {
        $query          = $this->db->get('categories_id');
        $categories = $query->result();
        if (empty($categories)) {
            return false;
        }


        return $this->getPreparedCategories($categories);
    }

}