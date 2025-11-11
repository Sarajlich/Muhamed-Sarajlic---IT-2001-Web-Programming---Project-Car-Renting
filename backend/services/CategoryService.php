<?php
require_once __DIR__ . '/../dao/CategoryDao.php';
require_once __DIR__ . '/BaseService.php';

class CategoryService extends BaseService {
    public function __construct() {
        $dao = new CategoryDao();
        parent::__construct($dao);
    }

    public function getCategoryByName($name){
        return $this->dao->getByName($name);
    }

    public function createCategory($data) {

        if (empty($data['name'])) {
            throw new Exception('Category name is required.');
        }

        $existing = $this->dao->getByName($data['name']);
        if (!empty($existing)) {
            throw new Exception('Category with this name already exists.');
        }

        return $this->create($data);
    }
}

?>