<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminFeedbacksController extends AdminContentController {
    public $name = 'AdminFeedbacks';
    public $uses = array('Feedback');

    public $paginate = array(
        'fields' => array('title', 'body', 'sorting', 'Media.*'),
        'order' => array('sorting' => 'asc'),
        'limit' => 20
    );
}
