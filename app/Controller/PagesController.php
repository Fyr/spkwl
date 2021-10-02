<?php
App::uses('AppController', 'Controller');
App::uses('Media', 'Media.Model');
App::uses('Page', 'Model');
App::uses('News', 'Model');
App::uses('Service', 'Model');
App::uses('Tag', 'Model');
class PagesController extends AppController {
	public $uses = array('Media.Media', 'Page', 'News', 'Service', 'Category', 'Subcategory', 'Tag');
	public $helpers = array('SiteForm');

	public function home() {
		/*
		$aPages = array();
		foreach($this->Page->find('all') as $page) {
			$slug = $page['Page']['slug'];
			$aPages[$slug] = $page;
		}

		$i = 2;
		while ($event = $this->Page->findBySlug("event-{$i}")) {
			$aEvents["event-{$i}"] = $event;
			$i++;
		}

		// hot news
		$conditions = array('published' => 1, 'featured' => 1);
		$order = array('modified' => 'desc');
		$aNews = $this->News->find('all', compact('conditions', 'order'));

		$order = array('sorting' => 'asc');
		$aServices = $this->Service->find('all', compact('order'));

		$aTags = $this->Tag->find('all');
		$this->set(compact('aPages', 'aNews', 'aCategories', 'aServices', 'aEvents'));

		if ($this->request->is(array('put', 'post'))) {
			fdebug($this->request->data, 'consult.log'); // to track why NULL records appear
			$this->Client = $this->loadModel('Client');

			$register = $this->request->data('Client.event_id');
			$service_id = $this->request->data('Client.service_id');
			$this->request->data('Client.service_id', intval($service_id));

			if ($this->Client->save($this->request->data)) {
				$route = ($register) 
					? array('?' => array('registered' => 'complete'), '#' => 'register') 
					: array('?' => array('consult' => 'complete'), '#' => 'consult');
				return $this->redirect($route);
			}
		}
		*/
	}

	public function view($slug) {
		$this->set('article', $this->Page->findBySlug($slug));
		// $this->currMenu = ucfirst($slug);
	}
}
