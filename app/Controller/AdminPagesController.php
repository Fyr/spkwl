<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminPagesController extends AdminContentController {
    public $name = 'AdminPages';
    public $uses = array('Page');

    public $paginate = array(
        'fields' => array('modified', 'title', 'slug'),
        'order' => array('modified' => 'desc'),
        'limit' => 20
    );
}
