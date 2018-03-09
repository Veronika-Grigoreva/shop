<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CMS_Model
{
    private $table = 'product';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    private function setCheckedCategory($categories, $productCategoriesData = array()) {
        foreach ($categories as $id => $category) {
            if (in_array($category->id, $productCategoriesData)) {
                $categories[$id]->checked = 1;
            } else {
                $categories[$id]->checked = 0;
            }

            if (isset($category->children) && $category->children) {
                $categories[$id]->children = $this->setCheckedCategory($categories[$id]->children, $productCategoriesData);
            }
        }

        return $categories;
    }

    protected function prepareData($data)
    {
        foreach ($data as $itemKey => $item) {
            foreach ($item as $key => $value) {
                switch ($key) {
                    case 'image':
                        $data[$itemKey]->image = '/img/cms/products/' . $data[$itemKey]->image;

                        if (!file_exists(FCPATH . $data[$itemKey]->image) || !is_file(FCPATH . $data[$itemKey]->image)) {
                            $data[$itemKey]->image = '/img/cms/products/default.jpg';
                        }
                        break;
                    case 'sale':
                        $data[$itemKey]->sale = (int)$data[$itemKey]->sale;
                        $data[$itemKey]->newprice = $data[$itemKey]->price - $data[$itemKey]->price * ((int)$data[$itemKey]->sale / 100);
                        break;
                }
            }
        }

        return $data;
    }

    public function setData($data, $field = null)
    {
        if (isset($data['category']) && $data['category']) {
            $data['categories_ids'] = serialize($data['category']);
            unset($data['category']);
        } else {
            $data['categories_ids'] = serialize(array());
        }

        parent::setData($data, $field);
    }

    public function prepareProductCategories($product = NULL)
    {
        $this->load->model('category');
        $allCategories = $this->category->getAllCategories();
        if ($product) {
            $productCategoriesData = unserialize($product->categories_ids);
            $productCategories = $this->setCheckedCategory($allCategories, $productCategoriesData);
        } else {
            $productCategories = $allCategories;
            $productCategories = $this->setCheckedCategory($allCategories);

        }

        return $productCategories;
    }
}
