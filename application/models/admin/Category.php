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
    private function renderCategoriesHtml($type, $collection = false)
    {
        if (!$collection) {
            $collection = $this->object;
        } else {
            $collection = $collection->object;
        }

        switch ($type) {
            case 'list':
                $html = $this->load->view('admin/categories/category-grid-item', ['collection' => $collection], TRUE);
                break;
            case 'radio':
                $html = $this->load->view('admin/categories/category-grid-item-radio',
                    [
                        'collection' => $collection,
                        'parrentCategoryId' => $this->getData('parent_category_id') ? $this->getData('parent_category_id') : 0,
                        'currentCategoryId' => $this->getData('id') ? $this->getData('id') : 0
                    ],
                    TRUE
                );
                break;

                //TODO checkbox
        }

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

    public function getData($field = null)
    {
        if (!$field) {
            $this->load->model('admin/category', 'categoryCollection');

            $collection = $this->categoryCollection->getCollection()
                ->prepareCategoriesCollection();

            $this->setData($this->getCategoriesGridHtml('radio', $collection), 'parentCategoryHtml');
//            $this->object->parentCategoryHtml = $this->getCategoriesGridHtml('radio', $collection);

            return $this->object;
        } else {
            return parent::getData($field);
        }
    }

    public function prepareCategoriesCollection()
    {
        $this->object = $this->prepareCategoryByChildren();

        return $this;
    }

    public function getCategoriesGridHtml($type = 'list', $collection = false)
    {
        return $this->renderCategoriesHtml($type, $collection);
    }
}
