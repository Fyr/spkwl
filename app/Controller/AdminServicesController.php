<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminServicesController extends AdminContentController {
    public $name = 'AdminServices';
    public $uses = array('Service');

    public $paginate = array(
        'fields' => array('slug', 'title', 'body', 'sorting'),
        'order' => array('sorting' => 'asc'),
        'limit' => 20
    );
}
