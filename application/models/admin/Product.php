<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CMS_Model
{
    private $table = 'product';

    private $product_categories_table = 'product_categories';

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

    public function load($id)
    {
        $this->db->select(array($this->table . '.*', $this->product_categories_table . '.id_category'));
        $this->db->from($this->table);
        $this->db->join('product_categories', $this->table . '.id = ' . $this->product_categories_table . '.id_product', 'left');
        $this->db->where($this->table . '.id', $id);
        $query = $this->db->get();

        $result = $query->result();

        $categories = [];
        foreach ($result as $item) {
            $categories[] = $item->id_category;
        }

        if (empty($result)) {
            return false;
        }

        $object = $result[0];
        $object->categories = $categories;
        unset($object->id_category);

        return self::$object = $object;
    }

    private function saveProductCategories($productId, $categories)
    {
        $this->db->where('id_product', $productId);
        $this->db->delete($this->product_categories_table);

        if ($categories) {
            $data = [];

            foreach ($categories as $category) {
                $data[] = [
                    'id_product'  => $productId,
                    'id_category' => $category
                ];
            }

            return $this->db->insert_batch($this->product_categories_table, $data);
        }

        return true;
    }

    public function save()
    {
        $data = [];

        foreach (self::$object as $key => $value) {
            $data[$key] = $value;
        }

        if (isset($data['id'])) {
            $categories = $data['categories'];
            unset($data['categories']);

            $this->db->where('id', self::$object->id);
            $this->db->update($this->table, $data);

            return $this->saveProductCategories(self::$object->id, $categories);
        } else {
            $categories = $data['category'];
            unset($data['category']);

            $this->db->insert($this->table, $data);
            $insertId = $this->db->insert_id();

            return $this->saveProductCategories($insertId, $categories);
        }
    }

    public function prepareProductCategories($product = NULL)
    {
        $this->load->model('category');
        $allCategories = $this->category->getAllCategories();
        if ($product) {
            if ($product->categories) {
                $productCategoriesData = $product->categories;
            } else {
                $productCategoriesData = array();
            }
            $productCategories = $this->setCheckedCategory($allCategories, $productCategoriesData);
        } else {
            $productCategories = $this->setCheckedCategory($allCategories);
        }

        return $productCategories;
    }
}
