<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminArticlesController extends AdminContentController {
    public $name = 'AdminArticles';
    public $uses = array('SiteArticle');

    public $paginate = array(
        'conditions' => array(),
        'fields' => array('modified', 'title', 'slug', 'published', 'featured', 'Media.*'),
        'limit' => 10
    );
}
