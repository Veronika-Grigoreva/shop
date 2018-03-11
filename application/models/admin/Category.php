<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CMS_Model
{
    private $table = 'categories_id';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    // use after prepareCategoryByChildren!!!
    private function renderCategoriesHtml($collection = false)
    {
        if (!$collection) {
            $collection = $this->object;
        }

        $html = $this->load->view('admin/categories/category-grid-item', ['collection' => $collection], TRUE);

        return $html;
    }

    private function prepareCategoryByChildren($parentCategory = false)
    {
        $preparedCollection = [];

        $collection = $this->object;

        if (!$parentCategory) {
            foreach ($collection as $id => $category) {
                if (!$category->parent_category_id) {
                    $preparedCollection[$category->id] = $category;
                    $preparedCollection[$category->id]->children = $this->prepareCategoryByChildren($preparedCollection[$category->id]);
                }
            }
        } else {
            foreach ($collection as $id => $category) {
                if ($parentCategory->id == $category->parent_category_id) {
                    $preparedCollection[$category->id] = $category;
                    $preparedCollection[$category->id]->children = $this->prepareCategoryByChildren($preparedCollection[$category->id]);
                }
            }
        }

        return $preparedCollection;
    }

    public function prepareCategoriesCollection()
    {
        $this->object = $this->prepareCategoryByChildren();

        return $this;
    }

    public function getCategoriesGridHtml()
    {
        return $this->renderCategoriesHtml();
    }
}
