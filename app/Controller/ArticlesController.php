<?php
App::uses('AppController', 'Controller');
class ArticlesController extends AppController {
	public $uses = array('SiteArticle');
	public $helpers = array('Core.PHTime');

	public function index() {
		$this->paginate = array(
			'SiteArticle' => array(
				'conditions' => array('published' => 1),
				'order' => array('modified' => 'desc'),
				'limit' => 6
			)
		);
		$this->set('aArticles', $this->paginate('SiteArticle'));
	}

	public function view($id) {
		$article = $this->SiteArticle->findById($id);
		$this->set('article', $article);
		$this->currMenu = 'Articles';
	}
}

