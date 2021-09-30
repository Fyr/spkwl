<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminProductsController extends AdminContentController {
    public $name = 'AdminProducts';
    public $uses = array('Product', 'Category', 'Tag');
    // public $helpers = array('Text', 'Media');

    public $paginate = array(
        'conditions' => array(),
        'fields' => array('created', 'modified', 'cat_id', 'title', 'Product.id AS tags', 'published', 'featured', 'Media.*'),
        'recursive' => 2,
        'order' => array('created' => 'desc'),
        'limit' => 20
    );

    public function beforeRender() {
        parent::beforeRender();
        $this->set('aCategories', $this->Category->find('list', array(
            'order' => 'Category.sorting'
        )));
        $this->set('aTags', $this->Tag->find('list', array(
            'order' => 'Tag.sorting'
        )));
    }

}
