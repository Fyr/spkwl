<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminSliderController extends AdminContentController {
    public $name = 'AdminSlider';
    public $uses = array('Slider');

    public $paginate = array(
        'fields' => array('title', 'sorting', 'Media.*'),
        'order' => array('sorting' => 'asc'),
        'limit' => 20
    );
}
